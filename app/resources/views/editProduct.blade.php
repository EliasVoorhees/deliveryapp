@extends('layouts.app')

@section('content')

        <div class="container">
                @if( session('message') )
                <div class="alert alert-{{session('type')}} alert-dismissible show">
                    <strong>{{session('message')}}</strong>
                </div>
                @endif

       <br>
       <div class="row">
              <div class="col s12">
                <span class="card-title"><a class="waves-effect waves-light btn-small green darken-1" href="{{route('productos.lista')}}"> Volver </a>  </div>
        </div>

            <div class="row">
                <div class="col s12">
                    <div class="card blue-grey darken-1">

                        <div class="card-content white-text">
                                <span class="card-title">Actualizar Producto</span>
                        </div>

                        <div class="card-content grey lighten-4">
                              @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                            <div id="role">

                           

                            <form action= " {{route('admin.updateProduct',$producto)}}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <label>
                               <b> Nombre del Producto </b>
                                <input value= "{{old('nombre', $producto->nombre)}}" type= "text" name ="nombre" required> </input>
                            </label>
                            <br> <br>
                            <label>
                               <b> Descripción del Producto </b>
                               <br> <br>
                                <textarea  name ="descripcion" required>{{old('descripcion', $producto->descripcion)}} </textarea>
                            </label>        
                            <br> <br>
                            <label>
                               <b> Tipo de Producto </b>
                                @php                                  
                                if(old('type') !== null){
                                 $option = old('type'); 
                                }
                                else{ $option = $producto->type; }
                                @endphp       

                               <select name="type" id="tipo" onchange="selectPizza()">
                                <option {{ $option  == "pizza"  ? 'selected' : '' }} value="pizza">Pizza</option>
                                <option {{ $option  == "bebida"  ? 'selected' : '' }} value="bebida">Bebida</option>
                                </select>
                            </label>
                            <br> 
                            <label>
                               <b> Precio del Producto </b>
                                <input value= "{{old('precio', $producto->precio)}}" step="any" type= "number" name ="precio" required> </input>
                            </label>
                            <br> <br>
                            <label id="selectPizzaT">
                               <b> Tamaño de la Pizza </b>
                                @php                                  
                                if(old('size') !== null){
                                 $size = old('size'); 
                                }
                                else{ $size = $producto->tamaño; }
                                @endphp            

                               <select name="size">
                                <option {{ $size == "Pequeña"  ? 'selected' : '' }}  value="Pequeña">Pequeña</option>
                                <option {{ $size == "Mediana"  ? 'selected' : '' }} value="Mediana">Mediana</option>
                                <option {{ $size == "Grande"  ? 'selected' : '' }} value="Grande">Grande</option>
                                </select>
                            </label>
                            <br> 
                            <label>
                            <b> Imagen del producto:   </b> 
                                <input src="{{ URL::asset('storage/product/'.$producto->image) }}" type= "file" accept=".png, .jpg, .jpeg" name ="image" required> </input>
                            </label>
                            <br> <br>
                                <label>
                            <b> ¿Producto disponible? </b>         </label>
                                 @php                                  
                                if(old('available') !== null){
                                 $available = old('available'); 
                                }
                                else{ $available = $producto->disponible; }
                                @endphp      

                                 <select name="available">
                                    <option {{  $available == "1"  ? 'selected' : '' }}   value="1">Si</option>
                                      <option {{  $available == "2"  ? 'selected' : '' }}  value="2">No</option>
                                        </select>
                     
                            <br> 
                            <div id="selectPizza">
                                <label>
                            <b> Agregar a Pizza </b>         </label>
                             <select name="pizza">
                             @php                                  
                                if(old('pizza') !== null){
                                 $pizzaid = old('pizza'); 
                                }
                                else{ $pizzaid = $producto->pizza_id; }
                                @endphp     

                                @foreach($pizzas as $pizza)
                                <option {{ $pizzaid == $pizza->id  ? 'selected' : '' }}  value="{{$pizza->id}}">{{$pizza->nombre}}</option>
                               @endforeach
                            </select>
                            </div>
                            <br> 
                                 <button class="btn waves-effect waves-light green darken-2" type="submit" name="action"> Actualizar Producto
                            </button>
                            </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

   <script type="text/javascript">

        selectPizza();
       function selectPizza(){
        var x = document.getElementById("selectPizza");
        var tipo = document.getElementById("tipo");

        
       
        if (tipo.value === "pizza") {
                x.style.display = "block";
        } else {
                x.style.display = "none";
        }
       
       var y = document.getElementById("selectPizzaT");

        if (tipo.value === "pizza") {
                y.style.display = "block";
        } else {
                y.style.display = "none";
        }

       
   }



    </script> 
                


@endsection
