<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GrupoUsuario
 *
 * @property $id
 * @property $grupoNombre
 * @property $grupoNivel
 * @property $grupoEstado
 * @property $created_at
 * @property $updated_at
 *
 * @property Usuario[] $usuarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class GrupoUsuario extends Model
{
    
    static $rules = [
		'grupoNombre' => 'required',
		'grupoNivel' => 'required',
		'grupoEstado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['grupoNombre','grupoNivel','grupoEstado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany('App\Models\Usuario', 'idgrupoUsuario', 'id');
    }
    

}
