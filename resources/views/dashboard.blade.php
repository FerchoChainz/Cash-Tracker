@extends('layouts.auth')

@section('title')
    Manage your budget and track your expenses
@endsection

@section('auth-contents')

    @if (session('success'))
        <p class="my-10 text-center text-green-500 bg-green-100 py-3">{{ session('success') }}</p>
    @endif

@endsection
