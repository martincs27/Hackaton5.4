<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';

    protected $fillable = ['id','nombre'];

    public function incidentes()
    {
        return $this->hasMany('App\Incidente');
    }

    public function mantenimientos()
    {
        return $this->hasMany('App\Mantenimiento');
    }
    
}
