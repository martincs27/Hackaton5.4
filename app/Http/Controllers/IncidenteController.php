<?php

namespace App\Http\Controllers;

use App\Incidente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IncidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidentes = Cache::remember('cacheequipos', 15 / 60, function () {
            return Incidente::simplePaginate(10);  // Paginamos cada 10 elementos.

        });
        return response()->json(['status' => 'ok', 'siguiente' => $incidentes->nextPageUrl(), 'anterior' => $incidentes->previousPageUrl(), 'data' => $incidentes->items()], 200);
    }

    public function show($id)
    {
        $incidente=Incidente::find($id);
        if (! $incidente)
        {
            return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un fabricante con ese código.'])],404);
        }
        return response()->json(['status'=>'ok','data'=>$incidente],200);

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
     * @param  \App\Incidente  $incidente
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incidente  $incidente
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidente $incidente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incidente  $incidente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidente $incidente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incidente  $incidente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidente $incidente)
    {
        //
    }
}
