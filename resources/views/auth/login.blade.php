@extends('layouts.auth')

@section('title')
    Log in
@endsection


@section('auth-contents')
<form method="post" class="mt-14 space-y-5" novalidate action="{{ route('login.store') }}">
    <div class="flex flex-col gap-2">
        <label class="font-bold text-2xl" for="email">Email</label>

        <input
            id="email"
            type="email"
            placeholder="Email de Registro"
            class="w-full border border-gray-300 p-3 rounded-lg"
            name="email"
            tabindex="1"
        />
    </div>
       {{-- EMAIL ERROR --}}
    @error('email')
        <p class="text-red-600">{{ $message }}</p>
    @enderror


    <div class="flex flex-col gap-2">
        <div class="flex  items-center justify-between">
            <label class="font-bold text-2xl">Password</label>
            <a href="#" class="text-indigo-950" tabindex="3">¿Olvidaste tu Contraseña?</a>
        </div>
        <input
            type="password"
            placeholder="Password de Registro"
            class="w-full border border-gray-300 p-3 rounded-lg"
            name="password"
            tabindex="2"
        />
    </div>
    {{-- PASSWORD ERROR --}}
    @error('password')
        <p class="text-red-600">{{ $message }}</p>
    @enderror


    <input
        type="submit"
        value='Iniciar Sesión'
        class="bg-[rgb(var(--main-color))] hover:bg-[rgb(var(--main-color-darker))] w-full p-3 rounded-lg text-white font-bold  text-xl cursor-pointer"
    />
</form>
@endsection
