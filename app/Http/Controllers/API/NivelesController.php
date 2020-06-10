<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Niveles;
use Illuminate\Http\Request;

use App\Http\Resources\NivelesResource;

class NivelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $niveles = Niveles::all();

        return new NivelesResource($niveles);
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
     * @param  \App\Models\Niveles  $nivel
     * @return \Illuminate\Http\Response
     */
    public function show(Niveles $nivel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Niveles  $nivel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Niveles $nivel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Niveles  $nivel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Niveles $nivel)
    {
        //
    }
}
