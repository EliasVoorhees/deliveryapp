@extends('layouts.app')

@section('content')

        <div class="container">
            <div class="row">
                <br><br><br>
                <div class="col s6 offset-s3">
                    <div class="card-panel green lighten-5">
                        <div class="row">
                            <form class="col s12" method="POST" action="{{ route('login') }}">
                                 @csrf
                                <div class="row">
                                <div class="input-field col s6 offset-s3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label for="email">Email</label>
                                           
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                </div>

                                </div>
                                <div class="row">
                                    <div class="input-field col s6 offset-s3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <label for="password">Password</label>
                                            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                    </div>
                                </div>

                                   
                                <div class="row">
                                    <div class="col s12 center-align">
                                        <button class="btn waves-effect waves-light green darken-2" type="submit" name="action">login
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                    <br><br><br>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                    <br><br><br>
                </div>
            </div>

        </div>
@endsection
