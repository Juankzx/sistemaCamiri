<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $fillable = [
        'user_id',
        'fecha_apertura',
        'fecha_cierre',
        'monto_apertura',
        'monto_cierre',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}