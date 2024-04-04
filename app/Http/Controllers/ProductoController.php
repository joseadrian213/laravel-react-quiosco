<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoCollection;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Si queremos paginar o mandar un json que se pueda utilizar con informacion para para la paginacion se debe de devolver de la siguiente manera 
        // return new ProductoCollection(Producto::orderBy("id","desc")->paginate(10));//Asi hace la paginacion como respuesta 
        return new ProductoCollection(Producto::where("disponible",1)->orderBy('id','desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
        $producto->disponible=0; 
        $producto->save();
        return [
           'producto'=> $producto
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
