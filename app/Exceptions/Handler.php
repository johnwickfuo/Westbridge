<?php

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
        'otpcode',
        'withdrawal_code',
    ];

    /**
     * A mistyped form value should never reveal a SQL exception to visitors.
     * Keep strict database checks, and return actionable input feedback for
     * known data/type/length/constraint failures on form submissions only.
     * Missing tables/columns and other operational errors still go through
     * Laravel's normal exception handling (and must be investigated).
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof QueryException
            && in_array(strtoupper($request->method()), ['POST', 'PUT', 'PATCH'], true)
            && in_array((int) ($e->errorInfo[1] ?? 0), [
                1048, // Required column cannot be null.
                1062, // Duplicate unique value.
                1264, // Number out of range.
                1265, // Truncated input.
                1292, // Invalid date or numeric value.
                1366, // Incorrect number/text type.
                1406, // Text longer than the column allows.
                1452, // Referenced selection does not exist.
                3819, // Failed check constraint.
            ], true)
        ) {
            // Preserve the underlying SQL error for the developer, not the visitor.
            $this->report($e);

            $message = 'We could not save those details. Please check the entered values, '
                .'especially number fields, dates, duplicate entries and unusually long text. '
                .'Your changes were not saved.';

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => $message,
                    'errors' => ['input' => [$message]],
                ], 422);
            }

            return redirect()->back()
                ->withInput($request->except($this->dontFlash))
                ->withErrors(['input' => $message])
                ->with('error', $message)
                ->with('message', $message);
        }

        return parent::render($request, $e);
    }

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
