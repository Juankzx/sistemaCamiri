<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @property $id
 * @property $idgrupoUsuario
 * @property $nombre
 * @property $nombreUsuario
 * @property $contraseña
 * @property $nivelUsuario
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Caja[] $cajas
 * @property Grupousuario $grupousuario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{
    
    static $rules = [
		'idgrupoUsuario' => 'required',
		'nombre' => 'required',
		'nombreUsuario' => 'required',
		'contraseña' => 'required',
		'nivelUsuario' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idgrupoUsuario','nombre','nombreUsuario','contraseña','nivelUsuario','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cajas()
    {
        return $this->hasMany('App\Models\Caja', 'idusuario', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grupousuario()
    {
        return $this->hasOne('App\Models\Grupousuario', 'id', 'idgrupoUsuario');
    }
    

}
