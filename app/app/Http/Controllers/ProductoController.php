<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
      $pizzas= Pizza::where('disponible', '1')->get();
      $bebidas= Producto::where('tipo', 'bebida')->where('disponible', '1')->get();
        
       $x=0;
       foreach($pizzas as $p){
            if($p->productos->isEmpty()) { $pizzas->forget($x);
            }
            else{
                    if($p->productos->where('disponible', '1')->isEmpty()) { 
                      $pizzas->forget($x);
                    }
        
            }
            $x++;
        }
   
        
      return view('welcome',compact('pizzas','bebidas'));
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
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
