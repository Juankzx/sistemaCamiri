<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'user_id',
        'proveedor_id',
        'cantidad',
        'precio',
        'metodo_pago',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
