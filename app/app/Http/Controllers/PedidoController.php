<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Models\Producto;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use App\Exports\PedidosExport;
use Maatwebsite\Excel\Facades\Excel;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function ordenes()
    {
        
      $pendientes= Pedido::where('estado', 'En Proceso')->orderByDesc('created_at')->get();
      $encamino= Pedido::where('repartidor_id', Auth::id())->where('estado', 'En Camino')->orderByDesc('updated_at')->get();
      $entregadas= Pedido::where('repartidor_id', Auth::id())->where('estado', 'Entregado')->orderByDesc('hora_entrega')->get();

      return view('manageOrder',compact('pendientes','encamino','entregadas'));
    }

    public function historial()
    {
        
      $pedidos= Pedido::orderByDesc('created_at')->where('estado', 'En Camino')->orwhere('estado', 'Entregado')->orwhere('estado', 'En Proceso');

           $pedidos =  $pedidos->get();
  
      return view('pedidos.historial',compact('pedidos'));
    }

     public function buscar(Request $request)
    {

      $total = 0;
      $output = '';
      $output2 = '';
      $query = $request->get('query');
      if($query != '')
      {
         $data= Pedido::orderByDesc('created_at')->where('estado', '!=', '')->get();
         
      }
      else
      {
         $data= Pedido::orderByDesc('created_at')->where('estado', '!=', '');
         $desde = Carbon::parse($request->get('desde'))->toDateString();
         $hasta = Carbon::parse($request->get('hasta'))->toDateString();

         if( $request->get('numero'))
             $data = $data->where('numero_pedido', $request->get('numero'));
  
         if( $request->get('estado'))
             $data = $data->where('estado', $request->get('estado'));

         if( $request->get('desde'))
             $data = $data->whereDate('created_at', '>=', $desde);

          if( $request->get('hasta'))
             $data = $data->whereDate('created_at', '<=', $hasta);

         if( $request->get('repartidor')){
            $repartidor = $request->get('repartidor');
               $data = $data->whereHas('repartidor', function($q)  use($repartidor) {
                $q->where('name', 'like', '%'.$repartidor.'%');
                 });
          }


        $data =  $data->get();
         
      }
         
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $total += $row->total_precio;
        $items = '';
        $repatidor = '';
        $hora = '';
        if($row->repartidor)$repatidor=$row->repartidor->name;
        if($row->hora_entrega)$hora = Carbon::parse($row->hora_entrega)->format('j F, Y g:i A');
        $horaP = Carbon::parse($row->created_at)->format('j F, Y g:i A');
        foreach($row->pedido_detalle as $detalles)
         {
         $items .= '
                  <tr>

                <td class="producto">'.$detalles->producto->nombre.'
                </td>
                <td class="producto">'.$detalles->producto->descripcion.'</td>
                    <td>       
                 <div style="padding:0 50px 0 50px">
                 <input disabled value="'.$detalles->comentarios.'"type="text" class="form-control">
                    </div> 
                </td>
              <td class="cantidad">
               <div>'.$detalles->cantidad.' </div>
                     </td>
                    <td>'.$detalles->precio.'$ </td>
                                            </tr>';
         }
       
        $output .= '
          <tr>
         <td>'. $row->numero_pedido .'</td>
         <td>'.$row->nombre_cliente.' </td>
         <td>'.$row->estado.'</td>
         <td> '.$repatidor.'</td>
         <td>'.$horaP.'</td>
          <td>'.$hora.'</td>
         <td>'.$row->total_precio.'$</td>
         <td><a id="'.$row->id.'"style="margin-right: 10px;" class="detalles waves-effect waves-light btn-small green darken-1"><i class="material-icons">add_circle_outline</i></a>
      <a href='.route('pedidos.editar', ['id' => $row->id]).' class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a>
             </td>
                </tr>
            <tr style="display:none; text-align: left;" id="pedidoD'.$row->id.'">
         <td style="text-align: left;" colspan="2"><b>Número de contacto:&nbsp  </b> 
         '.$row->numero_contacto.'</td>
        <td style="text-align: left;" colspan="3"><b>Dirección:  &nbsp </b> 
        '.$row->direccion.'</td>
            </tr>
         <tr style="display:none;" id="pedido'.$row->id.'"><td></td>
                <td colspan="5"> <table class="centered">
                   <thead>
                   <tr>
                  <th class="producto" >Producto</th>
                    <th class="producto">Descripción</th>
                    <th>Comentarios</th>
                     <th>Cantidad</th>
                     <th>Precio</th>
                        </tr>
                        </thead>
                     <tbody>
        '.$items.' </tbody>
           </table> 
                <br>
             <div style="text-align:right;font-size: 20px;">
        <b>Total:</b> '.$row->total_precio.'$</div>
                                </td>
                                </tr>
                                
        ';
       }
      }
       $output2 .= '<b>Total:&nbsp</b>'.$total.'$';
       
     return response()->json(['pedidos_data'=> $output, 'total'=> $output2  ]);
     
    }

     public function descargar(Request $request)
    {
        $numero = $request->get('numero');
        $estado = $request->get('estado');
        $desde = $request->get('desde');
        $hasta = $request->get('hasta');
        $repartidor = $request->get('repartidor');
      return (new PedidosExport($numero,$estado,$desde,$hasta,$repartidor))->download('Pedidos.xlsx');
     
    }




    public function index(Request $request)
    {
    


        $pedido = Session::has('pedido') ? Session::get('pedido') : null;
        if(!Session::has('pedido')){$pedido = new Pedido();$pedido->save();}
        $request->session()->put('pedido', $pedido );
        $pedido->refresh();
     
       return view('pedidos.index',compact('pedido'));

    }

      public function editar(Request $request,$id){
        
        $request->session()->forget('pedido');
        $pedido = Pedido::find($id);
        $request->session()->put('pedido', $pedido );

       return view('pedidos.editar',compact('pedido'));

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
            $pedido->nombre_cliente = $request->nombre;
            $pedido->numero_contacto = $request->telefono;
            $pedido->direccion = $request->direccion;
           

            $pedido->save();

         return response()->json(['success'=>$request->telefono]);
    }

    public function consultar(Request $request)
    {

        $validated = $request->validate([
                'pedido' => 'required',
        ]);
        $pedido = Pedido::find($request->pedido);

        if(!$pedido || $pedido->estado==""){
            Alert::error('Error', 'Pedido no encontrado');
            return redirect("/");
        }
        return view('pedidos.consultar',compact('pedido'));

    }

    public function store(Request $request)
    {
            $validated = $request->validate([
                'nombre' => 'required|max:255|regex:/^.(?=.*[a-zA-Z]).+$/',
                'telefono' => 'required|digits:11|numeric|gt:0',
                'direccion' => 'required|max:255|regex:/^.(?=.*[a-zA-Z]).+$/',
            ]);
          
            $pedido = Session::get('pedido');
            if($pedido->pedido_detalle->isEmpty()) return redirect()->route('pedidos.index');
            $pedido->nombre_cliente = $request->nombre;
            $pedido->numero_contacto = $request->telefono;
            $pedido->direccion = $request->direccion;
            $pedido->estado = "En Proceso";
            $pedido->total_precio =  $pedido->total_precio;
            $pedido->numero_pedido =  strval($pedido->id);
             $pedido->save();


            $pedido_detalle = $pedido->pedido_detalle ;
        
           foreach ($pedido_detalle as $producto) {
               $comentario = 'comentario'.$producto->id;
               $producto->comentarios=$request->input($comentario);
               $producto->save();
           }

            $pedido->refresh();

            $pedido->save();

            Alert::success('Pedido procesado con exito', 'Número de pedido: '.$pedido->numero_pedido);


            $request->session()->forget('pedido');



            return redirect("/");
            //
    }

     public function storeEdit(Request $request)
    {
            $validated = $request->validate([
                'nombre' => 'required|max:255|regex:/^.(?=.*[a-zA-Z]).+$/',
                'telefono' => 'required|digits:11|numeric|gt:0',
                'direccion' => 'required|max:255|regex:/^.(?=.*[a-zA-Z]).+$/',
            ]);
          
            $pedido = Session::get('pedido');
            if($pedido->pedido_detalle->isEmpty()) return redirect()->route('pedidos.editar');
            $pedido->nombre_cliente = $request->nombre;
            $pedido->numero_contacto = $request->telefono;
            $pedido->direccion = $request->direccion;
            $pedido->estado = $request->estado;
            $pedido->total_precio =  $pedido->total_precio;
            //$pedido->numero_pedido =  strval($pedido->id);
             $pedido->save();


            $pedido_detalle = $pedido->pedido_detalle ;
        
           foreach ($pedido_detalle as $producto) {
               $comentario = 'comentario'.$producto->id;
               $producto->comentarios=$request->input($comentario);
               $producto->save();
           }

            $pedido->refresh();

            $pedido->save();

            Alert::success('Pedido editado con exito');


            $request->session()->forget('pedido');

            return redirect()->route('pedidos.historial');
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

    public function encamino(Request $request, $id){

          
  
        $pedido = Pedido::find($id);
        $pedido->estado = "En Camino";
        $pedido->repartidor_id = Auth::id();
        $pedido->save();
        return redirect()->back();
    }

    public function entregado(Request $request, $id){

          
  
        $pedido = Pedido::find($id);
        $pedido->estado = "Entregado";
        $pedido->hora_entrega =  new Carbon();
        $pedido->save();
        return redirect()->back();
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

      public function addProductoE(Request $request, $id){

  
        $producto = Producto::find($id);
        $pedido = Session::has('pedido') ? Session::get('pedido') : null;
       if(!Session::has('pedido')){$pedido = new Pedido();$pedido->save();}
        $pedido->add($producto, $producto->id);
        $request->session()->put('pedido', $pedido );
        return redirect()->back()->withInput();
    }

    public function restarE(Request $request, $id){
        $producto = Producto::find($id);
        $pedido = Session::has('pedido') ? Session::get('pedido') : null;
       if(!Session::has('pedido')){$pedido = new Pedido();$pedido->save();}
        $pedido->restar($producto, $producto->id);
        $request->session()->put('pedido', $pedido );
        return redirect()->back()->withInput();
    }


  

    private function trash(){
     //   \Session::forget('pedido_detalle');
       // \Session::put('pedido_detalle', array());
        //return redirect()->route('pedidos.index');
    }

}
