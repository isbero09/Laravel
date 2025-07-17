<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaApiController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categoria::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valido = $request->validate([
            'nombre' => ["required", "string"],
            'descripcion' => ["required", "string"],
            'estado' => ["required", "string"],
        ]);
        $nuevo = Categoria::create($valido);
        return $nuevo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Categoria::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $actualizar = Categoria::findOrFail($id);
        $valido = $request->validate([
            'nombre' => ["required", "string"],
            'descripcion' => ["required", "string"],
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
        $delete = Categoria::findOrFail($id);

        if ($delete) {
            return response()->json(["message" => "Categoria borrado exitosamente"]);
        } else {
            return response()->json(["error" => "No se encontro el registro"], 404);
        }
    }
}
