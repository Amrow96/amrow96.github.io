<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Textos;
use App\Clases\Utilitat;
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
         $text = new Textos();

        $text->idtxt = $request->input('idtxt');
        $text->txtref = $request->input('txtref');
        $text->txtcat = $request->input('txtcat');
        $text->txtcast = $$request->input('txtcast');
        $text->txteng = $request->input('txteng');
        

        try {
            $text->save();
            
            $respuesta = (new TextoResource($text))
                ->response()
                ->setStatusCode(201);

        } catch (QueryException $e) {
            $mensaje = Utilitat::errorMessage($e);
            $respuesta = response()
                ->json(['error' => $mensaje], 400);
        }
        return $respuesta;
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
    public function update(Request $request,  $referencia)
    {
         $texto = Textos::find($referencia);
         $text->txtref = $request->input('txtref');
        $text->txtcat = $request->input('txtcat');
        $text->txtcast = $$request->input('txtcast');
        $text->txteng = $request->input('txteng');
        

        try {
            $text->save();
            
            $respuesta = (new TextoResource($text))
                ->response()
                ->setStatusCode(200);

        } catch (QueryException $e) {
            $mensaje = Utilitat::errorMessage($e);
            $respuesta = response()
                ->json(['error' => $mensaje], 400);
        }
        return $respuesta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Textos  $textos
     * @return \Illuminate\Http\Response
     */
    public function destroy($referencia)
    {
        
         $texto = Textos::find($referencia);
         
        if($text!= null){
            try {
            $text->delete();
            
            $respuesta = (new TextoResource($text))
                ->response()
                ->setStatusCode(200);

        } catch (QueryException $e) {
            $mensaje = Utilitat::errorMessage($e);
            $respuesta = response()
                ->json(['error' => $mensaje], 400);
        } }else{
            $respuesta = response()->json(["error"=> "Registro no encontrado"], 404);
        }
        return $respuesta;
    }
}
