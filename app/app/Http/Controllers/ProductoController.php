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

      $pizzas= Pizza::where('disponible', '1')->orderBy('orden','ASC')->get();
      $bebidas= Producto::where('tipo', 'bebida')->orderBy('orden','ASC')->where('disponible', '1')->get();
        
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

          $x=1;
       foreach($pizzas as $p){
          if($p->orden==0)$p->orden=$x;
          $x++;
          $p->save();
        }

        $x=1;
       foreach($bebidas as $p){
        if($p->orden==0)$p->orden=$x;
          $x++;
          $p->save();
        }
      

      return view('welcome',compact('pizzas','bebidas'));
    }

     public function lista()
    {
   

      $pizzas= Pizza::orderBy('orden','ASC')->get();
      $bebidas= Producto::where('tipo', 'bebida')->orderBy('orden','ASC')->get();


      return view('productos.lista',compact('pizzas','bebidas'));
    }

       public function ordenar(Request $request)
    {


        $pizzas= Pizza::all();

       foreach($pizzas as $p){
            foreach ($request->order as $order) {
                if ($order['id'] == $p->id) {
                    $p->update(['orden' => $order['position']]);
                }
            }
        }
        
        return response('Update Successfully.', 200);
    }

        public function ordenarB(Request $request)
    {


        $bebidas=Producto::where('tipo', 'bebida')->get();

       foreach($bebidas as $p){
            foreach ($request->order as $order) {
                if ($order['id'] == $p->id) {
                    $p->update(['orden' => $order['position']]);
                }
            }
        }
        
        return response('Update Successfully.', 200);
    }


    public function buscar(Request $request)
    {

 
      $output = '';
      $output2 = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = Pizza::where('disponible', '1')->orderBy('orden','ASC')
         ->where('nombre', 'like', '%'.$query.'%')
         ->orWhere('descripcion', 'like', '%'.$query.'%')
         ->get();

       $data2 = Producto::where('tipo', 'bebida')->orderBy('orden','ASC')->where('disponible', '1')
         ->where('nombre', 'like', '%'.$query.'%')
         ->orWhere('descripcion', 'like', '%'.$query.'%')
         ->get();
         
         
      }
      else
      {
       $data = Pizza::where('disponible', '1')->orderBy('orden','ASC')->get();
       $data2= Producto::where('tipo', 'bebida')->orderBy('orden','ASC')->where('disponible', '1')->get();
      }
         $x=0;
       foreach($data as $p){
            if($p->productos->isEmpty()) { $data->forget($x);
            }
            else{
                    if($p->productos->where('disponible', '1')->isEmpty()) { 
                      $data->forget($x);
                    }
        
            }
            $x++;
        }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $items = '';
        foreach($row->productos->where('disponible', '1') as $t)
         {
         $items .= '
                <option selected value="'.$t->id.'">'.$t->tamaño.' '.$t->precio.'$</option>';
         }
       
        $output .= '
        <div class="col s4">
        <div class="card">
        <div class="card-image">
         <img src='. asset("img/pizza.png") .'/>
         <a id='.$row->id.' class="add btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
         </div>
         <div class="card-content card-contentPizza">
         <span class="card-title">'.$row->nombre.'</span>
         <p>'.$row->descripcion.'</p>
         <div class="row">
            <div class="input-field col s12"> 
        <select id="producto'.$row->id.'">
         <option value="tamaño" disabled>Tamaño</option>'.$items.'  </select>
         </div>  
         </div>
         </div>
        </div>
        </div>
        ';
       }
      }

        $total_row2 = $data2->count();
      if($total_row2 > 0)
      {
       foreach($data2 as $row)
       {

        $output2 .= '
           <div class="col s4">
           <div class="card">
          <div class="card-image Bebida">
         <img src='. asset("img/pepsi.png") .'/>
           <a href='.route('pedidos.add', ['id' => $row->id]).' class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title">'.$row->nombre.'</span>
         <p>'.$row->descripcion.'</p>
        </div>
        </div>
        </div>
        ';
       }
      }

     return response()->json(['pizza_data'=> $output, 'bebida_data'  => $output2 ]);
     
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
