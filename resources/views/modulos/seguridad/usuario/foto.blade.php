@extends('layouts.app')

@section('title', 'Editar Foto de Usuario')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endpush

@section('slot')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">
                    Actualizar Foto de Perfil
                </h3>
                <a href="{{ route('usuarios.show', $usuario->idUsuario) }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="{{ route('usuarios.foto.update', $usuario->idUsuario) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="foto" class="form-label fw-semibold">
                                <i class="bi bi-upload me-1"></i> Seleccionar nueva imagen
                            </label>
                            <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png" class="form-control" required>
                            @error('foto')
                                <div class="text-danger mt-2 small">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Formatos permitidos: JPG, JPEG, PNG. Tamaño máximo: 2MB.</div>
                        </div>
                        <div class="mb-4">
                            <div class="row text-center">
                                <div class="col-md-6 mb-3">
                                    <p class="fw-semibold mb-2">Foto actual:</p>
                                    @if ($usuario->usuarioFoto)
                                        <img src="{{ asset('storage/' . $usuario->usuarioFoto) }}" alt="Foto actual"
                                            class="rounded-circle border shadow-sm"
                                            style="width: 140px; height: 140px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center border mx-auto shadow-sm"
                                            style="width: 140px; height: 140px;">
                                            <i class="bi bi-person text-muted fs-1"></i>
                                        </div>
                                        <p class="text-muted mt-2"><em>No hay foto actual.</em></p>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3 d-flex flex-column align-items-center">
                                    <p class="fw-semibold mb-2">Nueva imagen seleccionada:</p>
                                    <img id="nuevaFotoPreview" alt="Previsualización nueva imagen"
                                        class="rounded-circle border shadow-sm"
                                        style="width: 140px; height: 140px; object-fit: cover; display: none;">
                                        <p id="textoPreview" class="text-muted small mt-2 text-center">Aparecerá aquí cuando selecciones un archivo.</p>
                                </div>                                
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i> Guardar
                            </button>
                            <a href="{{ route('usuarios.show', $usuario->idUsuario) }}" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle me-1"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('javascript')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('foto');
        const preview = document.getElementById('nuevaFotoPreview');
        const mensajePreview = document.getElementById('textoPreview');

        if (!input || !preview) return;

        input.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!validTypes.includes(file.type)) {
                    alert('Solo se permiten imágenes .jpg, .jpeg o .png');
                    input.value = '';
                    preview.style.display = 'none';
                    if (mensajePreview) mensajePreview.style.display = 'block';
                    return;
                }
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    if (mensajePreview) mensajePreview.style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.src = '';
                if (mensajePreview) mensajePreview.style.display = 'block';
            }
        });
    });
</script>
@endpush
@endsection
