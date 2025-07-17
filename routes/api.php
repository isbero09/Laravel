<?php

use App\Http\Controllers\CategoriaApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetallesIngresosApiController;
use App\Http\Controllers\IngresoApiController;
use App\Http\Controllers\MenbresiaApiController;
use App\Http\Controllers\MenbresiaUsuarioApiController;
use App\Http\Controllers\ProductoApiController;
use App\Http\Controllers\UsuarioApiController;
use App\Http\Controllers\VentaApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource("ventas",VentaApiController::class);

Route::apiResource("usuarios", UsuarioApiController::class);

Route::apiResource("ingresos", IngresoApiController::class);

//Route::apiResource("categorias", CategoriaApiController::class);
Route::get('/categorias', [CategoriaApiController::class, 'index']);       // Listar todas
Route::post('/categorias', [CategoriaApiController::class, 'store']);     // Crear
Route::get('/categorias/{id}', [CategoriaApiController::class, 'show']);  // Obtener una
Route::put('/categorias/{id}', [CategoriaApiController::class, 'update']); // Actualizar
Route::delete('/categorias/{id}', [CategoriaApiController::class, 'destroy']); // Eliminar


Route::apiResource("productos", ProductoApiController::class);

Route::apiResource("detallesIngresos", DetallesIngresosApiController::class);

Route::apiResource("menbresia", MenbresiaApiController::class);

Route::apiResource("menbresiasUsuario", MenbresiaUsuarioApiController::class);

