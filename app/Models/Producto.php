<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'categoria_id',
        'descripcion',
        'estado',
    ];

    public function getEstadoAttribute($value)
    {
        return $value === 'Activo' ? 'Activo' : 'Inactivo';
    }

    // Relación con categorías
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class, 'categoria_id');
    }
}
