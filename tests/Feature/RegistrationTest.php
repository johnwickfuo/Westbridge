<?php

namespace Tests\Feature;

use App\Mail\WelcomeEmail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register_and_receive_one_welcome_email()
    {
        Mail::fake();

        $response = $this->post('/register', [
            'username' => 'newtrader',
            'name' => 'Test User',
            'email' => 'test@example.com',
            'country' => 'Canada',
            'phone' => '+14165550123',
            'password' => 'password123',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(RouteServiceProvider::HOME);
        $this->assertAuthenticated();

        $user = User::where('email', 'test@example.com')->firstOrFail();
        $this->assertSame('newtrader', $user->username);
        $this->assertSame('$', $user->currency);
        $this->assertSame('USD', $user->s_currency);

        Mail::assertSent(WelcomeEmail::class, function (WelcomeEmail $message) use ($user) {
            return $message->hasTo($user->email) && $message->user->is($user);
        });
        Mail::assertSent(WelcomeEmail::class, 1);
    }

    public function test_invalid_registration_does_not_send_a_welcome_email()
    {
        Mail::fake();

        $response = $this->post('/register', [
            'username' => 'newtrader',
            'name' => 'Test User',
            'email' => 'not-an-email',
            'country' => 'Canada',
            'phone' => '+14165550123',
            'password' => 'short',
        ]);

        $response->assertSessionHasErrors(['email', 'password']);
        Mail::assertNotSent(WelcomeEmail::class);
    }
}
