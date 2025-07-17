<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallesIngresos extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'ingreso',
        'producto_id',
        'cantidad',
    ];
      public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
