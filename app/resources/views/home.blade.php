@extends('layouts.app')

@section('content')

        <div class="container">
                @if( session('message') )
                <div class="alert alert-{{session('type')}} alert-dismissible show">
                    <strong>{{session('message')}}</strong>
                </div>
                @endif
 

            <div class="row">
                  <div class="col s12"><h4>Administración</h4></div> 
         <div class="col s12">

            <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button  style="margin-top:25px;" class="btn waves-effect waves-light green darken-2" type="submit" name="action">
                            {{ __('Logout') }}
                        </button> </form>
            </div>  </div>
                <div class="row">
   <div class="col s12">
                <span class="card-title"><a class="waves-effect waves-light btn-small green darken-1" href="{{route('admin.createPizza')}}"> Crear Pizza </a> <a class="waves-effect waves-light btn-small green darken-1" href = "{{route('admin.createProduct')}}"> Crear Producto </a> </span> 
       </div>
        </div>





            <div class="row">
                <div class="col s12">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                            <span class="card-title">Usuarios</span> 

                        </div>
                        
                        <div class="card-content grey lighten-4">
                          
                            <div id="role">
                                <table class="centered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Rol</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->tipo}}</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <div style="text-align:right; margin-right: 12px;">
                                    <a   href="{{route('users.create')}}" class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">person_add</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          
            </div>



@endsection
