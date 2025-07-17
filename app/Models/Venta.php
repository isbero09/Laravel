<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'cliente',
        'vendedor',
        'producto',
        'precio',
        'fecha_venta',
        'pagado',
        'fecha_pago',
    
    ];
}
