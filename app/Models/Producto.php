<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $categoria_id
 * @property $nombre
 * @property $cantidad
 * @property $precioCompra
 * @property $precioVenta
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'categoria_id' => 'required',
		'nombre' => 'required',
		'cantidad' => 'required',
		'precioCompra' => 'required',
		'precioVenta' => 'required',
        'estado' => 'estado'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['categoria_id','nombre','cantidad','precioCompra','precioVenta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

     protected $appends = ['ganancia','stockMinimo'];

     public function getGananciaAttribute()
     {
         return $this->precioVenta - $this->precioCompra;
     }


     public function getstockMinimoAttribute()
     {
         return $this->stockMinimo=10;
     }
 
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    

}
