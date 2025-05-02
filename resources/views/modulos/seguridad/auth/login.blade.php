@extends('layouts.auth.app')

@section('title', 'Login')

@section('content')
    @component('components.login.header')
        @slot('title', 'Bienvenido')
        @slot('subtitle')
            <span class="fs-4">Iniciar sesión</span>
        @endslot
    @endcomponent

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-3" id="alertContainer"></div>
    <form id="formLogin" method="post" action="{{ route('login.acceso') }}" class="my-5">
        @csrf
        <label class="input-group mb-3">
            <input id="usuarioAlias" type="text" class="form-control" name="usuarioAlias" required
                autocomplete="off" autofocus placeholder="Usuario" aria-label="usuario" aria-describedby="usuario">
        </label>
        <label class="input-group mb-3">
            <input placeholder="Contraseña" aria-label="contraseña" aria-describedby="Contraseña" id="password"
                type="password" class="form-control" name="usuarioPassword" required autocomplete="current-password">
        </label>

        <button type="submit" class="btn btn-dark w-100 mt-3">Iniciar</button>

        <div class="text-center mt-3">
            <a href="{{ route('password.recuperar') }}" class="text-decoration-none text-">¿Olvidaste tu contraseña?</a>
        </div>
    </form>
@endsection
