<?php

namespace App\Http\Controllers\Seguridad;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{

    public function catalogo()
    {
        $usuarios = Usuario::all();
        return view("modulos.seguridad.usuario.catalogo", compact('usuarios'));
    }

    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('modulos.seguridad.usuario.show', compact('usuario'));
    }

    public function editPhoto($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('modulos.seguridad.usuario.foto', compact('usuario'));
    }

    public function updatePhoto(Request $request, $id)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $usuario = Usuario::findOrFail($id);
        if ($usuario->usuarioFoto && Storage::exists('public/' . $usuario->usuarioFoto)) {
            Storage::delete('public/' . $usuario->usuarioFoto);
        }
        $archivo = $request->file('foto');
        $nombreArchivo = 'usuario_' . $usuario->idUsuario . '.' . $archivo->getClientOriginalExtension();
        $usuario->usuarioFoto = 'fotos/' . $nombreArchivo;
        $usuario->save();

        return redirect()
            ->route('usuarios.show', $usuario->idUsuario)
            ->with('success', 'Foto de perfil actualizada correctamente.');
    }
}
