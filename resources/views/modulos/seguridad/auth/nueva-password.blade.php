@extends('layouts.auth.app')

@section('title', 'Nueva Contraseña')

@section('content')
    @component('components.login.header')
        @slot('title', 'Establecer nueva contraseña')
        @slot('subtitle')
            <span class="fs-6">Ingresa una nueva contraseña para tu cuenta</span>
        @endslot
    @endcomponent

    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('password.nueva.guardar') }}">
        @csrf
        <label class="input-group mb-3 mt-4">
            <input type="password" name="nueva_contrasena" class="form-control" required minlength="8"
                placeholder="Nueva contraseña">
        </label>

        <button type="submit" class="btn btn-success w-100">Guardar</button>
        <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none">Cancelar</a>
        </div>
    </form>
@endsection
