<?php

namespace App\Support;

/**
 * Display preferences only; financial ledger and settlement amounts stay in USD.
 */
final class DisplayCurrencies
{
    public static function all(): array
    {
        return [
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
            'CAD' => 'C$',
            'AUD' => 'A$',
            'NZD' => 'NZ$',
            'NGN' => '₦',
            'GHS' => 'GH₵',
            'KES' => 'KSh',
            'ZAR' => 'R',
            'JPY' => '¥',
            'CNY' => '¥',
            'INR' => '₹',
            'AED' => 'د.إ',
            'PHP' => '₱',
            'SGD' => 'S$',
            'BRL' => 'R$',
        ];
    }

    public static function symbol(string $code): string
    {
        return self::all()[$code] ?? '$';
    }
}
