<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Producto;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->except(Auth::id());
        return view('home')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('users.create');
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
              $validated = $request->validate([
                'nombre' => 'required|unique:productos|max:255',
                'descripcion' => 'required|max:255',
                'precio' => 'required|numeric|gt:0',
                'image' => 'required|mimes:png,jpg,jpeg|max:5124',
            ]);


      if($request->type == "pizza"){
          
    
       if( Producto::where('pizza_id', $request->pizza)->where('tamaño',$request->size)->get()->isNotEmpty()){
         Alert::error('Error','Ya existe ese tamaño para esa pizza');
        return redirect()->route('admin.createProduct')->withInput();
             
       }

         $producto = new Producto();

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->tipo = $request->type;
        $producto->disponible = $request->available;
        $producto->precio = $request->precio;
        $producto->pizza_id = $request->pizza;
        $producto->tamaño = $request->size;
        $producto->orden = Producto::all()->max('orden') + 1;
    
        if ($request->hasFile('image')) {
           
          
            /* $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);*/
            $files = $request->file('image');
            $request->image->store('product', 'public');
            $producto->image =  $request->image->hashName();
          
       
        }

        $producto->save();
        
       
         Alert::success('Producto creado con exito');
        return redirect()->route('productos.lista');

      }
      else{

        $producto = new Producto();

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->tipo = $request->type;
        $producto->disponible = $request->available;
        $producto->precio = $request->precio;
        $producto->tamaño = $request->size;


        if ($request->hasFile('image')) {
          
          
            /* $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);*/

            $request->image->store('product', 'public');

            $producto->image =  $request->image->hashName();
          
       
        }
        $producto->orden = Producto::all()->max('orden') + 1;
        $producto->save();
        
       
        Alert::success('Producto creado con exito');
       return redirect()->route('productos.lista');

      }

       

    }

    public function storePizza(Request $request)
    {

       $validated = $request->validate([
                'nombre' => 'required|unique:pizzas|max:255',
                'descripcion' => 'required|max:255',
            ]);

      
         
         $pizza = new Pizza();

        $pizza->nombre = $request->nombre;
        $pizza->descripcion = $request->descripcion;
        $pizza->disponible = $request->available;
        $pizza->orden = Pizza::all()->max('orden') + 1;
        $pizza->save();
        
       
        Alert::success('Pizza creada con exito, debes agregarle productos');
        return redirect()->route('productos.lista');

     
       

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
                'email' => 'required|unique:users|max:255|email',
                'nombre' => 'required|max:255',
                'tipo' => 'required',
                'password' => 'required|min:8',
            ]);

            $user = new User;
            $user->name = $request->nombre;
            $user->email = $request->email;
            $user->tipo = $request->tipo;
            $user->password = bcrypt($request->password);
            $user->save();


            Alert::success('El usuario ha sido agregado exitosamente');


            return redirect('admin');
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
       
        return view('users.edit')->with('user',$user);


    }

    public function activo(Request $request, $id)
    {
         $user= User::find($id);
         if($user->activo)$user->activo=0;
         else $user->activo=1;

         $user->save();
         if($user->activo)
         Alert::info('Usuario activado');
         else Alert::info('Usuario desactivado');
         return redirect()->route('home');
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
        $validated = $request->validate([
            'email' => 'required|max:255|email|unique:users,email,'.$user->id,
            'nombre' => 'required|max:255',
            'tipo' => 'required',
            'password' => 'required|min:8',
        ]);

            $user->name = $request->nombre;
            $user->email = $request->email;
            $user->tipo = $request->tipo;
            $user->password = bcrypt($request->password);
            $user->save();

            Alert::success('El usuario ha sido editado exitosamente');
            return redirect('admin');

    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function updatePizza(Request $request, Pizza $pizza)
    {
      
        $validated = $request->validate([
            'nombre' => 'required|max:255|unique:pizzas,nombre,'.$pizza->id,
            'descripcion' => 'required|max:255',
        ]);

  
    $pizza->nombre = $request->nombre;
    $pizza->descripcion = $request->descripcion;
    $pizza->disponible = $request->available;
    $pizza->save();
    
   
    Alert::success('Pizza editada con exito');
    return redirect()->route('productos.lista');
        
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function updateProducto(Request $request, Producto $producto)
    {

        $validated = $request->validate([
            'nombre' => 'required|max:255|unique:productos,nombre,'.$producto->id,
            'descripcion' => 'required|max:255',
            'precio' => 'required|numeric|gt:0',
            'image' => 'required|mimes:png,jpg,jpeg|max:5124',
        ]);
       
        if($request->type == "pizza"){
          
    
           if($producto->tamaño != $request->size){
             
            if( Producto::where('pizza_id', $request->pizza)->where('tamaño',$request->size)->get()->isNotEmpty()){
                Alert::error('Error','Ya existe ese tamaño para esa pizza');
              return redirect()->route('admin.editProduct',$producto->id)->withInput();
                    
              }
           }

           
     
              
     
             $producto->nombre = $request->nombre;
             $producto->descripcion = $request->descripcion;
             $producto->tipo = $request->type;
             $producto->disponible = $request->available;
             $producto->precio = $request->precio;
             $producto->pizza_id = $request->pizza;
             $producto->tamaño = $request->size;
            
         
             if ($request->hasFile('image')) {
                
               
                 /* $request->validate([
                     'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
                 ]);*/
                 $files = $request->file('image');
                 $request->image->store('product', 'public');
                 $producto->image =  $request->image->hashName();
               
            
             }
     
             $producto->save();
             
            
              Alert::success('Producto editado con exito');
             return redirect()->route('productos.lista');
     
           }
           else{
     
             $producto = new Producto();
     
             $producto->nombre = $request->nombre;
             $producto->descripcion = $request->descripcion;
             $producto->tipo = $request->type;
             $producto->disponible = $request->available;
             $producto->precio = $request->precio;
             $producto->tamaño = $request->size;
     
     
             if ($request->hasFile('image')) {
               
               
                 /* $request->validate([
                     'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
                 ]);*/
     
                 $request->image->store('product', 'public');
     
                 $producto->image =  $request->image->hashName();
               
            
             }
             
             $producto->save();
             
            
             Alert::success('Producto editado con exito');
            return redirect()->route('productos.lista');
     
           }
     


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

 /**
     * Show the form for editing the specified Pizza
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function editPizza($id)
    {
        $pizza = Pizza::find($id);

        return view('editPizza')->with('pizza', $pizza);
        
    }

     /**
     * Show the form for editing the specified Product
     *
     * @param  \App\Models\Producto  $product
     * @return \Illuminate\Http\Response
     */
    public function editProduct($id)
    {
        $producto = Producto::find($id);
        $pizzas = DB::table('pizzas')->where('disponible', 1)->get();
        return view('editProduct')->with('producto', $producto)->with('pizzas',$pizzas);
    }

}
