<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Textos;
use Illuminate\Http\Request;
use App\Http\Resources\TextoResource;

class TextosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textos = Textos::all();

        return new TextoResource($textos);
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
     * @param  \App\Models\Textos  $textos
     * @return \Illuminate\Http\Response
     */
    public function show($referencia)
    {
        $texto = Textos::find($referencia);
        return new TextoResource($texto);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Textos  $textos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Textos $textos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Textos  $textos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Textos $textos)
    {
        //
    }
}
