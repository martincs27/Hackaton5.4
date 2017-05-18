<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{
    protected $table = 'incidentes';

    protected $fillable = ['id','fecha','equipo_id'];

    public function Equipo()
    {
        return $this->belongsTo('App\Equipo');
    }
}
