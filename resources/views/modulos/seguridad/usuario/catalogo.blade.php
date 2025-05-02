@extends('layouts.app')

@section('title', 'Usuarios')

@section('slot')
    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0">Catálogo de Usuarios</h3>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Email</th>
                                <th scope="col">Foto</th>
                                <th scope="col" class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->idUsuario }}</td>
                                    <td>
                                        <strong>{{ $usuario->usuarioAlias ?? $usuario->usuarioNombre }}</strong>
                                    </td>
                                    <td>{{ $usuario->usuarioEmail ?? '-' }}</td>
                                    <td>
                                        @if ($usuario->usuarioFoto)
                                            <img src="{{ asset('storage/' . $usuario->usuarioFoto) }}"
                                                 alt="Foto"
                                                 class="rounded-circle border"
                                                 style="width: 45px; height: 45px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">Sin foto</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('usuarios.show', $usuario->idUsuario) }}" class="btn btn-sm btn-outline-primary me-2">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('usuarios.foto.edit', $usuario->idUsuario) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-camera"></i> Foto
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
