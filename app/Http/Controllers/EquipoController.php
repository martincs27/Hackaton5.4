<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Incidente;
use App\Mantenimiento;
use Illuminate\Http\Request;
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
        /*$equipos = Equipo::all();
        $mantenimientos = Mantenimiento::all();
        $incidentes = Incidente::all();
        $datos = array(
            'equipos'=>$equipos,
            'mantenimientos'=>$mantenimientos,
            'incidentes'=>$incidentes,
        );
        return view('index',$datos);*/
        $equipos = Cache::remember('cacheequipos', 15 / 60, function () {
            return Fabricante::simplePaginate(10);  // Paginamos cada 10 elementos.

        });
        return response()->json(['status' => 'ok', 'siguiente' => $fabricantes->nextPageUrl(), 'anterior' => $fabricantes->previousPageUrl(), 'data' => $fabricantes->items()], 200);
    }

        public function show($id)
    {
        // Corresponde con la ruta /fabricantes/{fabricante}
        // Buscamos un fabricante por el ID.
        $equipo=Equipo::find($id);

        // Chequeamos si encontró o no el fabricante
        if (! $equipo)
        {
            // Se devuelve un array errors con los errores detectados y código 404
            return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un fabricante con ese código.'])],404);
        }

        // Devolvemos la información encontrada.
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
        //
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
    public function update(Request $request, Equipo $equipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        //
    }
}
