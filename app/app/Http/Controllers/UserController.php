<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Producto;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('home')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // return view('users.create');
    }

    /**
     * 
     * Controller that shows the add product view
     * 
     */
    public function createProduct()
    {

        $pizzas = DB::table('pizzas')->where('disponible', 1)->get();
        return view('createProduct')->with('pizzas', $pizzas);

    }

      /**
     * 
     * Controller that shows the add product view
     * 
     */
    public function createPizza()
    {

        return view('createPizza');

    }

        /**
     * 
     * Controller that stores the data of a new product
     * 
     */
    public function storeProduct(Request $request)
    {

      if($request->type == "pizza"){
         
         $producto = new Producto();

        $producto->nombre = $request->name;
        $producto->descripcion = $request->description;
        $producto->tipo = $request->type;
        $producto->disponible = $request->available;
        $producto->precio = $request->price;
        $producto->pizza_id = $request->pizza;
        $producto->tamaño = $request->size;

    
        if ($request->hasFile('image')) {
           
          
            /* $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);*/

            $request->image->store('product', 'public');

            $producto->image =  $request->image->hashName();
          
       
        }

        $producto->save();
        
       
        Alert::success('Producto creado con exito');
        return redirect()->route('users.index');

      }
      else{

        $producto = new Producto();

        $producto->nombre = $request->name;
        $producto->descripcion = $request->description;
        $producto->tipo = $request->type;
        $producto->disponible = $request->available;
        $producto->precio = $request->price;
        $producto->tamaño = $request->size;


        if ($request->hasFile('image')) {
          
          
            /* $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);*/

            $request->image->store('product', 'public');

            $producto->image =  $request->image->hashName();
          
       
        }

        $producto->save();
        
       
        Alert::success('Producto creado con exito');
        return redirect()->route('users.index');

      }

       

    }

    public function storePizza(Request $request)
    {

      
         
         $pizza = new Pizza();

        $pizza->nombre = $request->name;
        $pizza->descripcion = $request->description;
        $pizza->disponible = $request->available;
        $pizza->save();
        
       
        Alert::success('Pizza creada con exito, debes agregarle productos');
        return redirect()->route('users.index');

     
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         

             $validated = $request->validate([
                'email' => 'required|unique:users',
                'name' => 'required',
                'tipo' => 'required',
                'password' => 'required',
            ]);

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->tipo = $request->tipo;
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect('admin')->with(['message' => 'El usuario ha sido agregado exitosamente', 'type' => 'success']);
            //
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
