<?php

namespace Tests\Unit;

use App\Support\FlexibleTextInput;
use PHPUnit\Framework\TestCase;

class FlexibleTextInputTest extends TestCase
{
    public function test_numbers_are_accepted_as_text_only_for_explicit_text_fields()
    {
        $normalized = FlexibleTextInput::normalize([
            'name' => 1234,
            'phone' => 447700900111,
            'amount' => 250.75,
            'country' => 'Canada',
        ], ['name', 'phone', 'country']);

        $this->assertSame('1234', $normalized['name']);
        $this->assertSame('447700900111', $normalized['phone']);
        $this->assertSame('Canada', $normalized['country']);

        // Financial amounts are not changed or guessed.
        $this->assertSame(250.75, $normalized['amount']);
    }

    public function test_nested_invalid_values_are_not_silently_converted()
    {
        $normalized = FlexibleTextInput::normalize([
            'account_no' => ['unexpected', 'array'],
            'phone' => null,
        ], ['account_no', 'phone']);

        $this->assertSame(['unexpected', 'array'], $normalized['account_no']);
        $this->assertNull($normalized['phone']);
    }

    public function test_missing_fields_stay_missing()
    {
        $this->assertSame(
            ['amount' => '500'],
            FlexibleTextInput::normalize(['amount' => '500'], ['name', 'phone'])
        );
    }
}
