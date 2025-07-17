<?php

namespace App\Http\Controllers;

use App\Models\Menbresia;
use Illuminate\Http\Request;

class MenbresiaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Menbresia::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valido = $request->validate([
            'nombre' => ["required", "string"],
            'precio' => ["required", "numeric"],
            'descripcion' => ["required", "string"],
            'fecha_creacion' => ["required", "string"],
            'estado' => ["required", "string"],
        ]);
        $nuevo = Menbresia::create($valido);
        return $nuevo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Menbresia::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $actualizar = Menbresia::findOrFail($id);
        $valido = $request->validate([
            'nombre' => ["required", "string"],
            'precio' => ["required", "numeric"],
            'descripcion' => ["required", "string"],
            'fecha_creacion' => ["required", "string"],
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
        $delete = Menbresia::findOrFail($id);
        $delete->delete();
        if ($delete) {
            return response()->json(["message" => "Membresia borrada exitosamente"]);
        } else {
            return response()->json(["error" => "No se encontró el registro"], 404);
        }
    }
}
