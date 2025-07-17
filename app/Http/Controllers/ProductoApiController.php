<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Producto::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valido = $request->validate([
            'nombre' => ["required", "string"],
            'precio' => ["required", "double"],
            'stock' => ["required", "integer"],
            'categoria_id' => ["required", "integer"],
            'descripcion' => ["required", "string"],
            'estado' => ["required", "string"],
        ]);
        $nuevo = Producto::create($valido);
        return $nuevo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Producto::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $actualizar = Producto::findOrFail($id);
        $valido = $request->validate([
            'nombre' => ["required", "string"],
            'precio' => ["required", "double"],
            'stock' => ["required", "integer"],
            'categoria_id' => ["required", "integer"],
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
        $delete = Producto::findOrFail($id);
        if ($delete) {
            return response()->json(["message" => "Producto borrado exitosamente"]);
        } else {
            return response()->json(["error" => "No se encontró el registro"], 404);
        }
    }
}