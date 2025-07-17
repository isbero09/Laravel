<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usuario::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valido = $request->validate([
            'cedula' => ["required", "string"],
            'nombres' => ["required", "string"],
            'apellidos' => ["required", "string"],
            'email' => ["required", "string"],
            'telefono' => ["required", "string"],
            'estado' => ["required", "string"],
            'fecha_nacimiento' => ["required", "string"],
        ]);
        $nuevo = Usuario::create($valido);
        return $nuevo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cedula)
    {
        $usuario = Usuario::where('cedula', $cedula)->firstOrFail();
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $cedula)
    {
        $actualizar = Usuario::where('cedula', $cedula)->firstOrFail();

        $valido = $request->validate([
            'cedula' => ["required", "string"],
            'nombres' => ["required", "string"],
            'apellidos' => ["required", "string"],
            'email' => ["required", "string"],
            'telefono' => ["required", "string"],
            'estado' => ["required", "string"],
            'fecha_nacimiento' => ["required", "string"],
        ]);

        $actualizar->update($valido);
        return response()->json($actualizar);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cedula)
    {
        $delete = Usuario::where('cedula', $cedula)->firstOrFail();
    $delete->delete();

    return response()->json(["message" => "Usuario borrado exitosamente"]);
    }
}

