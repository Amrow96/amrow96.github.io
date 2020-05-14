<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\Imagenes;
use Illuminate\Http\Request;

use App\Http\Resources\ImatgeResource;

class ImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(){
        $imatges = Imagenes::all();

        return new ImatgeResource($imatges);
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
     * @param  \App\Models\Imagenes  $imagenes
     * @return \Illuminate\Http\Response
     */
    public function show(Imagenes $imagenes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imagenes  $imagenes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagenes $imagenes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imagenes  $imagenes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagenes $imagenes)
    {
        //
    }
}
