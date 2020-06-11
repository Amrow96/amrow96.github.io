<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Habilidades;
use Illuminate\Http\Request;

use App\Http\Resources\HabilidadesResource;

class HabilidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $habilidades = Habilidades::with('niveles')->get();

        return new HabilidadesResource($habilidades);
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
     * @param  \App\Models\Habilidades  $habilidad
     * @return \Illuminate\Http\Response
     */
    public function show(Habilidades $habilidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Habilidades  $habilidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habilidades $habilidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Habilidades  $habilidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habilidades $habilidad)
    {
        //
    }
}
