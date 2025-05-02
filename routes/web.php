<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seguridad\LoginController;
use App\Http\Controllers\Seguridad\UsuarioController;

Route::get('/', function () {
    return redirect('/seguridad/auth/login');
});

/**SEGURIDAD */
Route::prefix('seguridad')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/acceso', [LoginController::class, 'acceso'])->name('login.acceso');
        Route::match(['get', 'post'], '/auth/password/recuperar', [LoginController::class, 'form'])->name('password.recuperar');
        Route::post('/auth/password/verificar-codigo', [LoginController::class, 'verificarCodigo'])->name('password.verificar.codigo');
        Route::get('/auth/password/ingresar-codigo', function () {return view('modulos.seguridad.auth.codigo-password');})->name('password.ingresar.codigo');
        Route::get('/auth/password/nueva', function () {return view('modulos.seguridad.auth.nueva-password');})->name('password.nueva');
        Route::post('/auth/password/nueva', [LoginController::class, 'guardarNuevaPassword'])->name('password.nueva.guardar');
    });
    
    /**USUARIO */
    Route::prefix('usuario')->group(function () {
        Route::get('/catalogo', [UsuarioController::class, 'catalogo'])->name('usuarios.catalogo');
        Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');
        Route::get('/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
        Route::get('/{id}/foto', [UsuarioController::class, 'editPhoto'])->name('usuarios.foto.edit');
        Route::post('/{id}/foto', [UsuarioController::class, 'updatePhoto'])->name('usuarios.foto.update');
    });
});
