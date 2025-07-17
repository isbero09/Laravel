<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Models\Ingresos;
use Illuminate\Http\Request;

class IngresoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ingreso::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valido = $request->validate([
            'cedula' => ["required", "string"],
            'fecha' => ["required", "string"],
            'detalles' => ["required", "string"],
        ]);
        $nuevo = Ingreso::create($valido);
        return $nuevo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Ingreso::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $actualizar = Ingreso::findOrFail($id);
        $valido = $request->validate([
            'cedula' => ["required", "string"],
            'fecha' => ["required", "string"],
            'detalles' => ["required", "string"],
        ]);
        $actualizar->update($valido);
        return $actualizar;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Ingreso::findOrFail($id);
        if ($delete) {
            return response()->json(["message" => "Ingreso borrado exitosamente"]);
        } else {
            return response()->json(["error" => "No se encontró el registro"], 404);
        }
    }
}
