@extends('layouts.auth.app')

@section('title', 'Recuperar Contraseña')

@section('content')
    @component('components.login.header')
        @slot('title', 'Recuperar Contraseña')
        @slot('subtitle')
            <span class="fs-6">Ingresa tu correo para recibir el código de verificación</span>
        @endslot
    @endcomponent
    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('password.recuperar') }}">
        @csrf
        <label class="input-group mb-3 mt-6">
            <input type="email" class="form-control" name="email" required placeholder="Correo electrónico">
        </label>

        <button type="submit" class="btn btn-primary w-100">Continuar</button>
        <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none">Cancelar</a>
        </div>
    </form>
@endsection
