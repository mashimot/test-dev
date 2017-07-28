<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\Modelo;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.carros.index');
    }
    public function getCars(){
        $cars = Modelo::with('marca')->get();
        return $cars;
    }
    public function getMarcas(){
        $marcas = Marca::all();
        return response()->json($marcas);
    }
    public function getCar($id){
        $car = Modelo::find($id);
        return response()->json($car);
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
        $modelo = new Modelo;
        $modelo->id_marca = $request->input('id_marca');
        $modelo->ano = $request->input('ano');
        $modelo->name = $request->input('name');

        if($modelo->save()){
            $msg = [ 'success' => true ];
        } else {
            $msg = [ 'success' => true ];
        }
        return response()->json($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $msg = [];

        $modelo = Modelo::find($id);
        $modelo->id_marca = $request->input('id_marca');
        $modelo->name = $request->input('name');
        $modelo->ano = $request->input('ano');

        if($modelo->save()){
            $msg = [ 'success' => true ];
        } else {
            $msg = [ 'success' => true ];
        }
        return response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelo = Modelo::find($id);

        $modelo->delete();
        return array(
            'success' => true
        );
    }
}
