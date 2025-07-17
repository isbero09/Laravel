<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenbresiaUsuario extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'usuario',
        'membresia',
        'membresia_id',
        'precio',
        'fecha_pago',
        'fecha_inicio',
        'fecha_fin',
        'estado',
    ];

    public function membresia()
    {
        return $this->belongsTo(Menbresia::class, 'membresia_id');
    }
}
