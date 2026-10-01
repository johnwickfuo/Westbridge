<?php

namespace App\Mail;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * The welcome message is sent once by the Fortify registration action.
     * It is sent synchronously so no queue worker is required.
     */
    public function build()
    {
        $siteName = Settings::whereKey(1)->value('site_name') ?: config('app.name', 'Westbridge');

        return $this->subject('Welcome to '.$siteName)
            ->markdown('emails.welcome', [
                'siteName' => $siteName,
                'dashboardUrl' => url('/dashboard'),
            ]);
    }
}
