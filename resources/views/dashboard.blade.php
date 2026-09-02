@extends('layouts.auth')

@section('title')
    Manage your budget and track your expenses
@endsection

@section('auth-contents')

    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif

@endsection
