<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleVentum
 *
 * @property $id
 * @property $idproducto
 * @property $idventa
 * @property $cantidad
 * @property $precio
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property Venta $venta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleVentum extends Model
{
    
    static $rules = [
		'idproducto' => 'required',
		'idventa' => 'required',
		'cantidad' => 'required',
		'precio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idproducto','idventa','cantidad','precio'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'idproducto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function venta()
    {
        return $this->hasOne('App\Models\Venta', 'id', 'idventa');
    }
    

}
