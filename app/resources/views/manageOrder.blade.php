@extends('layouts.app')

@section('content')
    <div class="container">
      
            <br>

            <div class="row">

                      <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">
                            {{ __('Logout') }}
                        </button>
            </form>

                <div class="col s12">
                    <div class="card  green lighten-3">
                        <div class="card-content white-text">
                            <span class="card-title">Manage Order</span>
                        </div>
                        <div class="card-action">
                            <table class="centered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Client</th>
                                        <th>Seller</th>
                                        <th>Address</th>
                                        <th>Time</th>
                                        <th>Sent</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>7</td>
                                        <td>Sunny Estates, Gardnersville, NY</td>
                                        <td>2020-07-18 03:18:46</td>
                                        <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">send</i></a></td>
                                        <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>6</td>
                                        <td>4</td>
                                        <td>Dewy Bear Autoroute, Westville, NY</td>
                                        <td>2020-07-18 03:23:07</td>
                                        <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">send</i></a></td>
                                        <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>5</td>
                                        <td>3</td>
                                        <td>Fallen Brook Grove, West Sparta, NY</td>
                                        <td>2020-07-18 03:26:16</td>
                                        <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">send</i></a></td>
                                        <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <div style="text-align:right; margin-right: 2%;">
                                <a class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">add</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col s12">
                    <div class="card  green lighten-3">
                        <div class="card-content white-text">
                            <span class="card-title">Order History</span>
                        </div>
                        <div class="card-action">
                            <table class="centered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Client</th>
                                        <th>Seller</th>
                                        <th>Address</th>
                                        <th>Time</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>7</td>
                                        <td>Sunny Estates, Gardnersville, NY</td>
                                        <td>2020-07-18 03:18:46</td>
                                        <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">eject</i></a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>6</td>
                                        <td>4</td>
                                        <td>Dewy Bear Autoroute, Westville, NY</td>
                                        <td>2020-07-18 03:23:07</td>
                                        <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">eject</i></a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>5</td>
                                        <td>3</td>
                                        <td>Fallen Brook Grove, West Sparta, NY</td>
                                        <td>2020-07-18 03:26:16</td>
                                        <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">eject</i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

@endsection