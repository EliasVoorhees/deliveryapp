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
                    <div class="card blue-grey darken-1">

                        <div class="card-content white-text">
                                <span class="card-title">Crear Producto</span>
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

                           

                            <form action= " {{route('admin.storeProduct')}}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <label>
                               <b> Nombre del Producto </b>
                                <input type= "text" name ="nombre"> </input>
                            </label>
                            <br> <br>
                            <label>
                               <b> Descripción del Producto </b>
                               <br> <br>
                                <textarea name ="descripcion"> </textarea>
                            </label>        
                            <br> <br>
                            <label>
                               <b> Tipo de Producto </b>
                               <select name="type" onchange="selectPizza()">
                                <option value="pizza">Pizza</option>
                                <option value="bebida">Bebida</option>
                                </select>
                            </label>
                            <br> 
                            <label>
                               <b> Precio del Producto </b>
                                <input step="any" type= "number" name ="precio"> </input>
                            </label>
                            <br> <br>
                            <label id="selectPizzaT">
                               <b> Tamaño de la Pizza </b>
                               <select name="size">
                                <option value="Pequeña">Pequeña</option>
                                <option value="Mediana">Mediana</option>
                                <option value="Grande">Grande</option>
                                </select>
                            </label>
                            <br> 
                            <label>
                            <b> Imagen del producto:   </b> 
                                <input type= "file" accept=".png, .jpg, .jpeg" name ="image" required> </input>
                            </label>
                            <br> <br>
                                <label>
                            <b> ¿Producto disponible? </b>         </label>
                                 <select name="available">
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                     
                            <br> 
                            <div id="selectPizza">
                                <label>
                            <b> Agregar a Pizza </b>         </label>
                             <select name="pizza">
                                @foreach($pizzas as $pizza)
                                <option value="{{$pizza->id}}">{{$pizza->nombre}}</option>
                               @endforeach
                            </select>
                            </div>
                            <br> 
                                 <button class="btn waves-effect waves-light green darken-2" type="submit" name="action"> Crear Producto
                            </button>
                            </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                


@endsection
