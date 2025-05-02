@extends('layouts.auth.app')

@section('title', 'Validar Código')

@section('content')
    @component('components.login.header')
        @slot('title', 'Código de verificación')
        @slot('subtitle')
            <span class="fs-6">Ingresa el código que recibiste en tu correo</span>
        @endslot
    @endcomponent

    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('password.verificar.codigo') }}">
        @csrf
        <label class="input-group mb-3 mt-4">
            <input type="text" name="codigo" class="form-control" required placeholder="Código de verificación">
        </label>

        <button type="submit" class="btn btn-primary w-100">Verificar</button>
        <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none">Cancelar</a>
        </div>
    </form>
@endsection
