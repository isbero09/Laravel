<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado', // Agregado el campo estado
    ];

    public function getEstadoAttribute($value)
    {
        return $value ? 'Activo' : 'Inactivo';
    }
}
