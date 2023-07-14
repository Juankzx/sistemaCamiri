<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetalleVenta;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $fillable = ['user_id', 'proveedor_id', 'total'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function detallesVentas()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}

