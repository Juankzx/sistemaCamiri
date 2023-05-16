<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Caja
 *
 * @property $id
 * @property $idusuario
 * @property $fecha
 * @property $estadoCaja
 * @property $totalCaja
 * @property $observacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Usuario $usuario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Caja extends Model
{
    
    static $rules = [
		'idusuario' => 'required',
		'fecha' => 'required',
		'estadoCaja' => 'required',
		'totalCaja' => 'required',
		'observacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idusuario','fecha','estadoCaja','totalCaja','observacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne('App\Models\Usuario', 'id', 'idusuario');
    }
    

}
