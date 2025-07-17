<?php

namespace App\Http\Controllers;

use App\Models\membresiasUsuarios;
use App\Models\MenbresiaUsuario;
use Illuminate\Http\Request;

class MenbresiaUsuarioApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MenbresiaUsuario::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valido = $request->validate([
            'usuario' => ["required", "string"],
            'membresia' => ["required", "string"],
            'membresia_id' => ["required", "integer"],
            'precio' => ["required", "double"],
            'fecha_pago' => ["required", "string"],
            'fecha_inicio' => ["required", "string"],
            'fecha_fin' => ["required", "string"],
            'estado' => ["required", "string"],
        ]);
        $nuevo = MenbresiaUsuario::create($valido);
        return $nuevo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return MenbresiaUsuario::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $actualizar = MenbresiaUsuario::findOrFail($id);
        $valido = $request->validate([
            'usuario' => ["required", "string"],
            'membresia' => ["required", "string"],
            'membresia_id' => ["required", "integer"],
            'precio' => ["required", "double"],
            'fecha_pago' => ["required", "string"],
            'fecha_inicio' => ["required", "string"],
            'fecha_fin' => ["required", "string"],
            'estado' => ["required", "string"],
        ]);
        $actualizar->update($valido);
        return $actualizar;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = MenbresiaUsuario::findOrFail($id);
        if ($delete) {
            return response()->json(["message" => "Membresia de usuario borrada exitosamente"]);
        } else {
            return response()->json(["error" => "No se encontró el registro"], 404);
        }
    }
}
