<?php

namespace App\Http\Controllers;

use App\Incidente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IncidenteController extends Controller
{
    public function equipoinc($id)
    {
        $incidente= new Incidente();
        $incidente->equipo_id = $id;
        $incidente->fecha = Carbon::now(-5);
        $incidente->save();
        return response()->json('Creado exitosamente',200);
    }
    public function destroy(Incidente $incidente)
    {
        //
    }
}
