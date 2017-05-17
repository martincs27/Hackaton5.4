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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Cache::remember('cacheequipos', 15 / 60, function () {
            return Equipo::simplePaginate(10);  // Paginamos cada 10 elementos.

        });
        return response()->json(['status' => 'ok', 'siguiente' => $equipos->nextPageUrl(), 'anterior' => $equipos->previousPageUrl(), 'data' => $equipos->items()], 200);
    }

        public function show($id)
    {
        $equipo=Equipo::find($id);
        if (! $equipo)
        {
            return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un equipo con ese código.'])],404);
        }
        return response()->json(['status'=>'ok','data'=>$equipo],200);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
            if (!$request->input('nombre'))
            {
                return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan datos necesarios para procesar el alta.'])],422);
            }
            $nuevoEquipo=Equipo::create($request->all());

            // Devolvemos la respuesta Http 201 (Created) + los datos del nuevo equipo + una cabecera de Location + cabecera JSON
            $respuesta= Response::make(json_encode(['data'=>$nuevoEquipo]),201)->header('Location','http://localhost:8000/equipos/'.$nuevoEquipo->id)->header('Content-Type','application/json');
            return $respuesta;

        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    /*public function show(Equipo $equipo)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
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
