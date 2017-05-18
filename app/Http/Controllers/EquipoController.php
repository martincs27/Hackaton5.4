<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Incidente;
use App\Mantenimiento;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::all();
        return response()->json($equipos,200);
    }

        public function show($id)
    {
        $equipo=Equipo::find($id);
        if (! $equipo)
        {
            return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un equipo con ese código.'])],404);
        }
        return response()->json($equipo,200);

    }
    public function mant($id)
    {
        $mant=Equipo::find($id)->mantenimientos;
        if (! $mant)
        {
            return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un equipo con ese código.'])],404);
        }
        return response()->json($mant,200);

    }
    public function inc($id)
    {
        $inc=Equipo::find($id)->incidentes;
        if (! $inc)
        {
            return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un equipo con ese código.'])],404);
        }
        return response()->json($inc,200);

    }
    public function store(Request $request)
        {
            if (!$request->input('nombre'))
            {
                return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan datos necesarios para procesar el alta.'])],422);
            }
            $equipo = Equipo::create($request->all());
            return 'Equipo correctamente creado'.$equipo->id;
        }
    public function edit(Equipo $equipo)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $equipo=Equipo::find($id);
        if (! $equipo)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un equipo con ese código.'])],404);
        }
        $nombre=$request->input('nombre');

        // Comprobamos si recibimos petición PATCH(parcial) o PUT (Total)
        if ($request->method()=='PATCH')
        {
            $bandera=false;
            if ($nombre !=null && $nombre!='')
            {
                $equipo->nombre=$nombre;
                $bandera=true;
            }
            if ($bandera)
            {
                $equipo->save();
                return response()->json(['status'=>'ok','data'=>$equipo],200);
            }
            else
            {
                return response()->json(['errors'=>array(['code'=>304,'message'=>'No se ha modificado ningún dato del equipo.'])],304);
            }
        }
        if (!$nombre)
        {
            return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan valores para completar el procesamiento.'])],422);
        }
        $equipo->nombre=$nombre;
        $equipo->save();
        return response()->json(['status'=>'ok','data'=>$equipo],200);

    }
    public function destroy($id)
    {
        $equipo=Equipo::find($id);
        if (! $equipo)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra el equipo con ese código.'])],404);
        }
        $mantenimientos = $equipo->mantenimientos;

        if (sizeof($mantenimientos) >0)
        {
            return response()->json(['errors'=>array(['code'=>409,'message'=>'Este equipo posee mantenimientos y no puede ser eliminado.'])],409);
        }
        $equipo->delete();
        return response()->json(['code'=>204,'message'=>'Se ha eliminado correctamente el equipo.'],204);
    }

}
