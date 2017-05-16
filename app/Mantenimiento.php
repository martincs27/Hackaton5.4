<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $table = 'mantenimientos';

    protected $fillable = ['id','fechainicio','fechafin'];

    public function Equipo()
    {
        return $this->belongsTo('App\Equipo');
    }

}
