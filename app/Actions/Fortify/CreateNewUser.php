<?php

namespace App\Actions\Fortify;

use App\Mail\WelcomeEmail;
use App\Models\User;
use App\Models\CryptoAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * The public registration form has exactly six fields. Currency is always
     * initialized to USD, independently of site-wide display preferences.
     */
    public function create(array $input)
    {
        $data = Validator::make($input, [
            'username' => ['required', 'string', 'alpha_dash', 'max:191', 'unique:users,username'],
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email'],
            'country' => ['required', 'string', 'max:191'],
            'phone' => ['required', 'string', 'max:191'],
            'password' => ['required', 'string', 'min:8'],
        ])->validate();

        // Preserve tracked referral links without asking for an extra signup field.
        $referrer = session('ref_by')
            ? User::where('username', session('ref_by'))->first()
            : null;

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'username' => $data['username'],
            'country' => $data['country'],
            'ref_by' => $referrer ? $referrer->id : null,
            'currency' => '$',
            's_currency' => 'USD',
            'status' => 'active',
            'password' => Hash::make($data['password']),
        ]);

        $account = new CryptoAccount();
        $account->user_id = $user->id;
        $account->save();

        request()->session()->forget('ref_by');

        // Send one welcome message after the account and wallet are created.
        // Email transport errors must be logged without undoing a valid signup.
        try {
            Mail::to($user->email)->send(new WelcomeEmail($user));
        } catch (\Throwable $e) {
            \Log::error('Welcome email could not be sent after registration.', [
                'user_id' => $user->id,
                'exception' => $e,
            ]);
        }

        return $user;
    }
}
