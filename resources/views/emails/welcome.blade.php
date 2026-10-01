@component('mail::message')
# Welcome to {{ $siteName }}, {{ $user->name }}!

Thank you for registering. Your account has been created successfully, and we're pleased to welcome you to {{ $siteName }}.

Here are a few things you can do next:

1. **Confirm your email address** if you receive a separate verification email.
2. **Visit your dashboard** to review and complete your account information.
3. **Explore the platform** and review the available services and relevant risk information before making any financial decisions.

@component('mail::button', ['url' => $dashboardUrl])
Go to Your Dashboard
@endcomponent

Your registration email: **{{ $user->email }}**

If you did not create this account, please contact our support team through the official website.

Thank you,  \
**The {{ $siteName }} Team**

@component('mail::subcopy')
Investments and trading involve risk. Returns are not guaranteed. Never share your password or verification codes with anyone.
@endcomponent
@endcomponent
