@extends('layouts.auth')

@section('title')
    Verify Email
@endsection

@section('auth-contents')

    <p class="mt-5 text-lg">Your account has been created. Please verify your email address.</p>

    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        <input
        type ="submit"
        class="bg-amber-500 w-full text-center mt-5 px-5 py-2 uppercase font-bold cursor-pointer rounded-2xl"
        value="Resend Verification Email"
        />
    </form>

@endsection
