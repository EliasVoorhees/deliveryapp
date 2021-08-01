@extends('layouts.app')

@section('content')

        <div class="container">
                @if( session('message') )
                <div class="alert alert-{{session('type')}} alert-dismissible show">
                    <strong>{{session('message')}}</strong>
                </div>
                @endif
            <div class="row">
                <div class="col s12"><h4>Crear Producto</h4></div>    
            </div>
      
            <div class="row">
                <div class="col s12">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                           
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab"><a class="active" href="#role">Form</a></li>
                            </ul>
                        </div>
                        <div class="card-content grey lighten-4">
                            <div id="role">

                           

                            <form action= " {{route('admin.storeProduct')}}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <label>
                               <b> Nombre del Producto </b>
                                <input type= "text" name ="name"> </input>
                            </label>
                            <br> <br>
                            <label>
                               <b> Descripción del Producto </b>
                               <br> <br>
                                <textarea name ="description"> </textarea>
                            </label>        
                            <br> <br>
                            <label>
                               <b> Tipo de Producto </b>
                               <select name="type" onchange="selectPizza()">
                                <option value="pizza">Pizza</option>
                                <option value="bebida">Bebida</option>
                                </select>
                            </label>
                            <br> <br>
                            <label>
                               <b> Precio del Producto </b>
                                <input type= "number" name ="price"> </input>
                            </label>
                            <br> <br>
                            <label>
                               <b> Tamaño del Producto </b>
                               <select name="size">
                                <option value="pequeño">Pequeño</option>
                                <option value="mediano">Mediano</option>
                                <option value="grande">Grande</option>
                                </select>
                            </label>
                            <br> <br>
                            <label>
                            <b> Imagen del producto:   </b> 
                                <input type= "file" accept=".png, .jpg, .jpeg" name ="image" required> </input>
                            </label>
                            <br> <br>
                            <label>
                            <b> Producto disponible? </b> 
                             <select name="available">
                                <option value="1">Yes <option>
                                <option value="0">No</option>
                                </select>
                            </label>
                            <br> <br>

                            <div id="selectPizza">
                            <label>
                            <b> Agregar a Pizza </b> 
                             <select name="pizza">
                                @foreach($pizzas as $pizza)
                                <option value="{{$pizza->id}}"> {{$pizza->nombre}} <option>
                               @endforeach
                            </select>
                            </label>
                            </div>
                            <br> <br>

                            <button type="submit">
                            Crear Producto
                             </button>
                            </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                


@endsection
