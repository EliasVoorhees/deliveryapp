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
                            <span class="card-title">Crear Pizza</span>
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

                           

                            <form action= " {{route('admin.storePizza')}}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <label>
                               <b> Nombre de la Pizza </b>
                                <input type= "text" name ="nombre"> </input>
                            </label>
                            <br> <br>
                            <label>
                               <b> Descripción de la Pizza</b>
                               <br> <br>
                                <textarea name ="descripcion"> </textarea>
                            </label>        
                            <br> <br>
                            <label>
                            <b> ¿Producto disponible? </b>         </label>
                                 <select name="available">
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                     
                
                            <br> 
                                <button class="btn waves-effect waves-light green darken-2" type="submit" name="action"> Crear Pizza
                            </button>
                            </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                


@endsection
