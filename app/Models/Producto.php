<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $idcategoria
 * @property $nombre
 * @property $cantidad
 * @property $precioCompra
 * @property $precioVenta
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Detalleventum[] $detalleventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'idcategoria' => 'required',
		'nombre' => 'required',
		'cantidad' => 'required',
		'precioCompra' => 'required',
		'precioVenta' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idcategoria','nombre','cantidad','precioCompra','precioVenta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'idcategoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleventas()
    {
        return $this->hasMany('App\Models\Detalleventum', 'idproducto', 'id');
    }
    

}
