<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 *
 * @property $id
 * @property $fecha
 * @property $metodoPago
 * @property $created_at
 * @property $updated_at
 *
 * @property Detalleventum[] $detalleventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'metodoPago' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','metodoPago'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleventas()
    {
        return $this->hasMany('App\Models\Detalleventum', 'idventa', 'id');
    }
    

}
