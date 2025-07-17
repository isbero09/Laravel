<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menbresia extends Model
{
    protected $table = 'menbresias';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'nombre',
        'precio',       
        'descripcion',
        'fecha_creacion',
        'estado',
    ];
}
