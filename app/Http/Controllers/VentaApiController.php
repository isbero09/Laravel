<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Ventas;
use Illuminate\Http\Request;

class VentaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Venta::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valido = $request->validate([
            'cliente' => ["required", "string"],
            'vendedor' => ["required", "string"],
            'producto' => ["required", "string"],
            'precio' => ["required", "numeric  "],
            'fecha_venta' => ["required", "string"],
            'pagado' => ["required", "boolean"],
            'fecha_pago' => ["required", "string"],
        ]);
        $nuevo = Venta::create($valido);
        return $nuevo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Venta::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $actualizar = Venta::findOrFail($id);
        $valido = $request->validate([
            'cliente' => ["required", "string"],
            'vendedor' => ["required", "string"],
            'producto' => ["required", "string"],
            'precio' => ["required", "numeric"],
            'fecha_venta' => ["required", "string"],
            'pagado' => ["required", "boolean"],
            'fecha_pago' => ["required", "string"],
        ]);
        $actualizar->update($valido);
        return $actualizar;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venta = Venta::findOrFail($id);

        if ($venta->delete()) {
            return response()->json(["message" => "Venta borrada exitosamente"]);
        } else {
            return response()->json(["error" => "Error al borrar la venta"], 500);
        }
    }
}