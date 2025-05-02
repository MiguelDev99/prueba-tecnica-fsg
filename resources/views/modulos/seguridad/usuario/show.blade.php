@extends('layouts.app')

@section('title', 'Detalle de Usuario')

@section('slot')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Detalle del Usuario</h3>
                <a href="{{ route('usuarios.catalogo') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex flex-column flex-md-row align-items-center gap-4">
                    <div class="text-center">
                        @if ($usuario->usuarioFoto)
                            <img src="{{ asset('storage/' . $usuario->usuarioFoto) }}"
                                alt="Foto"
                                class="rounded-circle border"
                                style="width: 120px; height: 120px; object-fit: cover;">
                        @else
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center border"
                                style="width: 120px; height: 120px;">
                                <i class="bi bi-person text-muted fs-1"></i>
                            </div>
                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="fw-bold mb-2">{{ $usuario->usuarioNombre ?? 'Usuario' }}</h5>
                        <p class="mb-2"><strong> Alias:</strong> {{ $usuario->usuarioAlias ?? 'Sin Alias' }}</p>
                        <p class="mb-3"><strong> Email:</strong> {{ $usuario->usuarioEmail ?? 'No registrado' }}</p>
                        <a href="{{ route('usuarios.foto.edit', $usuario->idUsuario) }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-camera"></i> Adjuntar Foto
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
