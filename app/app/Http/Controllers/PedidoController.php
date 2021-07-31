<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Session;
use App\Models\Producto;
use RealRashid\SweetAlert\Facades\Alert;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
       // $request->session()->forget('pedido');

        $pedido = Session::has('pedido') ? Session::get('pedido') : null;
        if(!Session::has('pedido')){$pedido = new Pedido();$pedido->save();}
        $request->session()->put('pedido', $pedido );
        $pedido->refresh();

       return view('pedidos.index',compact('pedido'));

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

    public function crearSession(Request $request)
    {

   
            $pedido = Session::get('pedido');
            $pedido->nombre_cliente = $request->name;
            $pedido->numero_contacto = $request->telefono;
            $pedido->direccion = $request->direccion;
           

            $pedido->save();

         return response()->json(['success'=>$request->telefono]);
    }

    public function store(Request $request)
    {
            $validated = $request->validate([
                'name' => 'required',
                'telefono' => 'required',
                'direccion' => 'required',
            ]);
          
            $pedido = Session::get('pedido');
            if($pedido->pedido_detalle->isEmpty()) return redirect()->route('pedidos.index');
            $pedido->nombre_cliente = $request->name;
            $pedido->numero_contacto = $request->telefono;
            $pedido->direccion = $request->direccion;
            $pedido->estado = "En Proceso";
            $pedido->total_precio =  $pedido->total_precio;
            $pedido->numero_pedido =  strval($pedido->id);
             $pedido->save();


            $pedido_detalle = $pedido->pedido_detalle ;
        
           foreach ($pedido_detalle as $producto) {
               $producto->comentarios=$request->comentario.$producto->id;
               $producto->save();
           }

            $pedido->refresh();

            $pedido->save();

            Alert::success('Pedido procesado con exito', 'Número de pedido: '.$pedido->numero_pedido);


            $request->session()->forget('pedido');



            return redirect("/");
            //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }

    public function addProducto(Request $request, $id){

          
  
        $producto = Producto::find($id);
        $pedido = Session::has('pedido') ? Session::get('pedido') : null;
       if(!Session::has('pedido')){$pedido = new Pedido();$pedido->save();}
        $pedido->add($producto, $producto->id);
        $request->session()->put('pedido', $pedido );
        return redirect()->route('pedidos.index');
    }

    public function restar(Request $request, $id){
        $producto = Producto::find($id);
        $pedido = Session::has('pedido') ? Session::get('pedido') : null;
       if(!Session::has('pedido')){$pedido = new Pedido();$pedido->save();}
        $pedido->restar($producto, $producto->id);
        $request->session()->put('pedido', $pedido );
        return redirect()->route('pedidos.index');
    }

  

    private function trash(){
     //   \Session::forget('pedido_detalle');
       // \Session::put('pedido_detalle', array());
        //return redirect()->route('pedidos.index');
    }

}
