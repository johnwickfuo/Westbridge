<?php

namespace App\Support;

use Illuminate\Http\Request;

/**
 * Browsers send text inputs as strings, but some mobile/JSON clients send
 * phone numbers, account references or even names as JSON numbers. Convert
 * only explicit text fields, never balances, financial amounts or IDs.
 */
class FlexibleTextInput
{
    public static function normalize(array $input, array $fields): array
    {
        foreach ($fields as $field) {
            if (!array_key_exists($field, $input)) {
                continue;
            }

            if (is_int($input[$field]) || is_float($input[$field])) {
                $input[$field] = (string) $input[$field];
            }
        }

        return $input;
    }

    public static function normalizeRequest(Request $request, array $fields): void
    {
        $original = $request->all();
        $normalized = self::normalize($original, $fields);
        $request->merge(array_intersect_key($normalized, array_flip($fields)));
    }
}
