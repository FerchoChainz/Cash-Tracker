@extends('layouts.auth')

@section('title')
    Create Account
@endsection

@section('auth-contents')
<form method="post" action="{{ route('register.store') }}" class="mt-14 space-y-5" novalidate>
    <div class="space-y-2">
        <label class="font-bold text-2xl block" for="name">Name</label>

        <input
            id="name"
            type="text"
            placeholder="Name"
            class="w-full border border-gray-300 p-3 rounded-lg"
            name="name"
            value="{{ old('name') }}"
        />
    </div>
    {{-- NAME ERROR --}}
    <x-input-error field="name" />
    {{-- NAME ERROR --}}

    <div class="space-y-2">
        <label class="font-bold text-2xl block" for="email">Email</label>

        <input
            id="email"
            type="email"
            placeholder="Email"
            class="w-full border border-gray-300 p-3 rounded-lg"
            name="email"
            value="{{ old('email') }}"
        />
    </div>
    {{-- EMAIL ERROR --}}
    <x-input-error field="email" />
    {{-- EMAIL ERROR --}}

    <div class="space-y-2">
        <label class="font-bold text-2xl block">Password</label>

        <input
            type="password"
            placeholder="Password"
            class="w-full border border-gray-300 p-3 rounded-lg"
            name="password"
        />
    </div>
    {{-- PASSWORD ERROR --}}
    <x-input-error field="password" />
    {{-- PASSWORD ERROR --}}

    <div class="space-y-2">
        <label class="font-bold text-2xl block" for="password_confirmation">Confirm Password</label>

        <input
            type="password"
            placeholder="Confirm Password"
            class="w-full border border-gray-300 p-3 rounded-lg"
            name="password_confirmation"
        />
    </div>

    <input
        type="submit"
        value='Create Account'
        class="bg-[rgb(var(--main-color))] hover:bg-[rgb(var(--main-color-darker))] w-full p-3 rounded-lg text-white font-bold  text-xl cursor-pointer" />
</form>

@endsection
