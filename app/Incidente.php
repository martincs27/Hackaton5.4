<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{
    protected $table = 'incidentes';

    protected $fillable = ['id','fecha'];

    public function Equipo()
    {
        return $this->belongsTo('App\Equipo');
    }
}
