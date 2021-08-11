@extends('layouts.app')

@section('content')
<div class="container">
            <div class="row">
                <div class="col s12"><h4>Crear Usuario</h4></div>  
           
        
 </div>
                @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
   <div class="col s12">
                <span class="card-title"><a class="waves-effect waves-light btn-small green darken-1" href="{{route('home')}}"> Volver </a> 
        </div>
 </div>

            <div class="row">
                <div class="col s8 offset-s2">
                    <div class="card-panel green lighten-5">
                        <div class="row">
                                 <form role="form" @if(isset($edit)) action="{{ route('users.update', $user->id) }}" @elseif( !isset($show) ) action="{{ route('users.store') }}" @endif method="post" class="col s12" enctype="multipart/form-data">
                                   @csrf
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input  value= "{{old('nombre')}}" name="nombre" id="nombre" type="text" class="validate">
                                        <label for="nombre">Nombre</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input value= "{{old('email')}}" name="email" id="email" type="email" class="validate">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input  name="password" id="password" type="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                     <div class="input-field col s6">
                                        <select name="tipo"  id="tipo">
                                            <option value="" disabled>Choose your option</option>
                                            <option {{  old('tipo') == "repartidor"  ? 'selected' : '' }} value="repartidor">Repartidor</option>
                                            <option {{  old('tipo') == "admin"  ? 'selected' : '' }} value="admin">Admin</option>
                                        </select>
                                        <label>Rol</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 center-align">
                                        <button class="btn waves-effect waves-light green darken-2" type="submit" name="action">Crear
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection