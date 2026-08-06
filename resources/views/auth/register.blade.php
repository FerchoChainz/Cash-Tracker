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
        />
    </div>
    {{-- NAME ERROR --}}
    @error('name')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
    {{-- NAME ERROR --}}

    <div class="space-y-2">
        <label class="font-bold text-2xl block" for="email">Email</label>

        <input
            id="email"
            type="email"
            placeholder="Email"
            class="w-full border border-gray-300 p-3 rounded-lg"
            name="email"
        />
    </div>
    {{-- EMAIL ERROR --}}
    @error('email')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
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
    @error('password')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
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
