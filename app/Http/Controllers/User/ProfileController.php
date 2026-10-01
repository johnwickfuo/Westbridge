<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Support\DisplayCurrencies;
use App\Support\FlexibleTextInput;

class ProfileController extends Controller
{
    /** Set this user's display currency, leaving USD ledger amounts unchanged. */
    public function updateCurrency(Request $request)
    {
        $data = $request->validate([
            'currency' => ['required', 'string', Rule::in(array_keys(DisplayCurrencies::all()))],
        ]);

        $request->user()->update([
            's_currency' => $data['currency'],
            'currency' => DisplayCurrencies::symbol($data['currency']),
        ]);

        return redirect()->back()->with('success', 'Display currency updated successfully.');
    }

    // Text fields accept digits as well as letters, but remain length checked.
    // Invalid dates return form errors rather than reaching MySQL.
    public function updateprofile(Request $request)
    {
        FlexibleTextInput::normalizeRequest($request, ['name', 'phone', 'address']);

        $data = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:191'],
            'dob' => ['sometimes', 'nullable', 'date', 'before_or_equal:today'],
            'phone' => ['sometimes', 'nullable', 'string', 'max:191'],
            'address' => ['sometimes', 'nullable', 'string', 'max:5000'],
        ]);

        if ($data) {
            User::whereKey(Auth::id())->update($data);
        }

        return response()->json(['status' => 200, 'success' => 'Profile information updated successfully!']);
    }

    // Account references, phone and wallet addresses are free-form text.
    // Only fields supplied by the form are updated.
    public function updateacct(Request $request)
    {
        $columns = [
            'bank_name' => 'bank_name',
            'account_name' => 'account_name',
            'account_no' => 'account_number',
            'swiftcode' => 'swift_code',
            'btc_address' => 'btc_address',
            'eth_address' => 'eth_address',
            'ltc_address' => 'ltc_address',
            'usdt_address' => 'usdt_address',
        ];
        FlexibleTextInput::normalizeRequest($request, array_keys($columns));

        $rules = [];
        foreach ($columns as $field => $column) {
            $rules[$field] = ['sometimes', 'nullable', 'string', 'max:191'];
        }
        $data = $request->validate($rules);

        $updates = [];
        foreach ($columns as $field => $column) {
            if (array_key_exists($field, $data)) {
                $updates[$column] = $data[$field];
            }
        }
        if ($updates) {
            User::whereKey(Auth::id())->update($updates);
        }

        return response()->json(['status' => 200, 'success' => 'Withdrawal info updated successfully!']);
    }

    //Update Password
    public function updatepass(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('message', 'Current password does not match!');
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Password updated successfully');
    }

    // Update email preference logic
    public function updateemail(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->sendotpemail = $request->otpsend;
        $user->sendroiemail = $request->roiemail;
        $user->sendinvplanemail = $request->invplanemail;
        $user->save();
        return response()->json(['status' => 200, 'success' => 'Email Preference updated']);
    }
}