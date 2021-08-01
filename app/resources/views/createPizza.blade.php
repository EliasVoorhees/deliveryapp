@extends('layouts.app')

@section('content')

        <div class="container">
                @if( session('message') )
                <div class="alert alert-{{session('type')}} alert-dismissible show">
                    <strong>{{session('message')}}</strong>
                </div>
                @endif
            <div class="row">
                <div class="col s12"><h4>Crear Pizza</h4></div>    
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

                           

                            <form action= " {{route('admin.storePizza')}}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <label>
                               <b> Nombre de la Pizza </b>
                                <input type= "text" name ="name"> </input>
                            </label>
                            <br> <br>
                            <label>
                               <b> Descripción de la Pizza</b>
                               <br> <br>
                                <textarea name ="description"> </textarea>
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
                            <button type="submit">
                            Crear Pizza
                             </button>
                            </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                


@endsection
