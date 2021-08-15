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
                            <span class="card-title">Actualizar Pizza</span>
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

                           

                            <form action= " {{route('admin.updatePizza',$pizza)}}"   method="POST" enctype="multipart/form-data">

                            @csrf

                            <label>
                               <b> Nombre de la Pizza </b>
                                <input value= "{{old('nombre', $pizza->nombre)}}" type= "text" name ="nombre"> </input>
                            </label>
                            <br> <br>
                            <label>
                               <b> Descripción de la Pizza</b>
                               <br> <br>
                                <textarea name ="descripcion"> {{old('descripcion', $pizza->descripcion)}}</textarea>
                            </label>        
                            <br> <br>
                            <label>
                            <b> ¿Producto disponible? </b>         </label>
                            @php                                  
                                if(old('available') !== null){
                                 $option = old('availabe'); 
                                }
                                else{ $option = $pizza->disponible; }
                                @endphp       


                             <select name="available">
                                    <option {{  $option  == "1"  ? 'selected' : '' }}   value="1">Si</option>
                                      <option {{  $option == "2"  ? 'selected' : '' }}  value="2">No</option>
                                        </select>
                
                            <br> 
                                <button class="btn waves-effect waves-light green darken-2" type="submit" name="action"> Actualizar Pizza
                            </button>
                            </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                


@endsection
