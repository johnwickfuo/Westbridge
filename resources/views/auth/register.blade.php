@extends('layouts.guest1')
@section('title', 'Create Account')
@section('content')
<div class="min-h-screen bg-gray-900 flex items-center justify-center px-4 py-8 sm:py-12">
    <div class="w-full max-w-xl rounded-2xl border border-gray-700 bg-gray-900 p-6 sm:p-9 shadow-2xl">
        <div class="text-center mb-7">
            <a href="{{ route('home') }}" aria-label="Return to homepage">
                <img src="{{ asset('storage/app/public/'.$settings->logo) }}" alt="{{ $settings->site_name }}" class="h-12 w-auto mx-auto mb-5">
            </a>
            <h1 class="text-2xl sm:text-3xl font-bold text-white">Create your account</h1>
            <p class="text-sm text-gray-400 mt-2">Enter your details below to get started.</p>
        </div>

        @if ($errors->any())
            <div role="alert" class="rounded-lg bg-red-900/40 border border-red-500 p-4 mb-5 text-sm text-red-100">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="username" class="block text-sm font-medium text-gray-200 mb-1">Username</label>
                <input id="username" name="username" type="text" value="{{ old('username') }}" autocomplete="username" maxlength="191" required pattern="[A-Za-z0-9_-]+" class="block w-full rounded-lg border border-gray-600 bg-gray-800 px-4 py-3 text-white focus:border-blue-400 focus:ring-blue-400" placeholder="Choose a username">
            </div>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-200 mb-1">Full name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" maxlength="191" required class="block w-full rounded-lg border border-gray-600 bg-gray-800 px-4 py-3 text-white focus:border-blue-400 focus:ring-blue-400" placeholder="Your full name">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-200 mb-1">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" maxlength="191" required class="block w-full rounded-lg border border-gray-600 bg-gray-800 px-4 py-3 text-white focus:border-blue-400 focus:ring-blue-400" placeholder="you@example.com">
            </div>
            <div>
                <label for="country" class="block text-sm font-medium text-gray-200 mb-1">Country</label>
                <select id="country" name="country" required class="block w-full rounded-lg border border-gray-600 bg-gray-800 px-4 py-3 text-white focus:border-blue-400 focus:ring-blue-400">
                    <option value="" disabled {{ old('country') ? '' : 'selected' }}>Select your country</option>
                    @include('auth.countries')
                </select>
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-200 mb-1">Phone number</label>
                <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel" maxlength="191" required class="block w-full rounded-lg border border-gray-600 bg-gray-800 px-4 py-3 text-white focus:border-blue-400 focus:ring-blue-400" placeholder="+1 555 000 0000">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-200 mb-1">Password</label>
                <input id="password" name="password" type="password" autocomplete="new-password" minlength="8" required class="block w-full rounded-lg border border-gray-600 bg-gray-800 px-4 py-3 text-white focus:border-blue-400 focus:ring-blue-400" placeholder="At least 8 characters">
            </div>
            <button type="submit" class="w-full rounded-lg bg-blue-600 hover:bg-blue-700 px-4 py-3 text-white font-semibold transition">Create account</button>
        </form>
        <p class="text-center text-sm text-gray-400 mt-6">Already registered? <a class="text-blue-400 hover:text-blue-300 font-semibold" href="{{ route('login') }}">Sign in</a></p>
    </div>
</div>
@if(old('country'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('country').value = @json(old('country'));
    });
</script>
@endif
@endsection
