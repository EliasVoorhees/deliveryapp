@extends('layouts.app')

@section('content')
<div class="container">
            <br><br>
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
                <div class="col s8 offset-s2">
                    <div class="card-panel green lighten-5">
                        <div class="row">
                                 <form role="form" @if(isset($edit)) action="{{ route('users.update', $user->id) }}" @elseif( !isset($show) ) action="{{ route('users.store') }}" @endif method="post" class="col s12" enctype="multipart/form-data">
                                   @csrf
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input name="name" id="name" type="text" class="validate">
                                        <label for="name">Nombre</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input  name="email" id="email" type="email" class="validate">
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
                                            <option value="" disabled selected>Choose your option</option>
                                            <option value="repartidor">Repartidor</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                        <label>Role</label>
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