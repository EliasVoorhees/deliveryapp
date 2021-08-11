@extends('layouts.app')

@section('content')
<style>

     input {
      color: black !important;
    }



 </style>
    <div class="container">

             <div class="row">
            <div class="col s12">
            <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button  style="margin-top:25px;" class="btn waves-effect waves-light green darken-2" type="submit" name="action">
                            {{ __('Logout') }}
                        </button>  </form>
                  </div> 
                 </div> 
            <div class="row">
                <div class="col s12">
                    <div class="card  green lighten-3">
                        <div class="card-content white-text">
                            <span class="card-title">Pedidos Disponibles</span>
                        </div>
                        <div class="card-action">
                            <table class="centered">
                                <thead>
                                    <tr>
                                        <th>Número</th>
                                        <th>Cliente</th>
                                        <th>Número de contacto</th>
                                        <th>Dirección</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pendientes as $p)
                                    <tr>
                                        <td>{{$p->numero_pedido}}</td>
                                        <td>{{$p->nombre_cliente}}</td>
                                        <td>{{$p->numero_contacto}}</td>
                                        <td>{{$p->direccion}}</td>
                                        <td><a id={{$p->id}} style="margin-right: 10px;" class="detalles waves-effect waves-light btn-small green darken-1"><i class="material-icons">add_circle_outline</i></a>
                                        <a href="{{route('pedidos.encamino', ['id' => $p->id])}}" class="waves-effect waves-light btn-small green darken-1">En Camino</a>
                                        </td>
                                    </tr>
                                    <tr style="display:none;" id="pedido{{ $p->id }}">
                                        <td></td>
                                  <td colspan="4"> <table class="centered">
                                        <thead>
                                            <tr>
                                                <th class="producto" >Producto</th>
                                                <th class="producto">Descripción</th>
                                                <th>Comentarios</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($p->pedido_detalle as $detalles)
                                            <tr>

                                                <td class="producto">{{$detalles->producto->nombre}}</td>
                                                <td class="producto">{{$detalles->producto->descripcion}} </td>
                                                <td>       
                                                   <div style="padding:0 50px 0 50px">
                                                <input disabled value="{{$detalles->comentarios}}" id="comentario" type="text" class="form-control" name="comentario{{$detalles->id}}" value="{{ old('email') }}">
                   
                                            </div> 
                                             </td>
                                                <td class="cantidad">
                                                 
                                                    <div> {{ $detalles->cantidad}}  </div>

                                                  </td>

                                                <td>{{$detalles->precio}}$ </td>
                                            </tr>
                                       @endforeach
                                        </tbody>
                                    </table> 
                                    <br>
                                        <div style="text-align:right;font-size: 20px;">
                                   <b>Total:</b> {{$p->total_precio}}$ 
                                </div>
                                </td>
                                </tr>
                                
                                     @endforeach
                                </tbody>
                            </table>
                   
                        </div>
                    </div>
                </div>
           </div> 
               
            <div class="row">
                <div class="col s12">
                    <div class="card  green lighten-3">
                        <div class="card-content white-text">
                            <span class="card-title">Mis Pedidos para Entregar</span>
                        </div>
                        <div class="card-action">
                            <table class="centered">
                                <thead>
                                    <tr>
                                        <th>Número</th>
                                        <th>Cliente</th>
                                        <th>Número de contacto</th>
                                        <th>Dirección</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($encamino as $p)
                                    <tr>
                                        <td>{{$p->numero_pedido}}</td>
                                        <td>{{$p->nombre_cliente}}</td>
                                        <td>{{$p->numero_contacto}}</td>
                                        <td>{{$p->direccion}}</td>
                                        <td><a id={{$p->id}} style="margin-right: 10px;" class="detalles waves-effect waves-light btn-small green darken-1"><i class="material-icons">add_circle_outline</i></a>
                                        <a href="{{route('pedidos.entregado', ['id' => $p->id])}}" class="waves-effect waves-light btn-small green darken-1">Entregado</a>
                                        </td>
                                    </tr>
                                    <tr style="display:none;" id="pedido{{ $p->id }}">
                                        <td></td>
                                  <td colspan="4"> <table class="centered">
                                        <thead>
                                            <tr>
                                                <th class="producto" >Producto</th>
                                                <th class="producto">Descripción</th>
                                                <th>Comentarios</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($p->pedido_detalle as $detalles)
                                            <tr>

                                                <td class="producto">{{$detalles->producto->nombre}}</td>
                                                <td class="producto">{{$detalles->producto->descripcion}} </td>
                                                <td>       
                                                   <div style="padding:0 50px 0 50px">
                                                <input disabled value="{{$detalles->comentarios}}" id="comentario" type="text" class="form-control" name="comentario{{$detalles->id}}" value="{{ old('email') }}">
                   
                                            </div> 
                                             </td>
                                                <td class="cantidad">
                                                 
                                                    <div> {{ $detalles->cantidad}}  </div>

                                                  </td>

                                                <td>{{$detalles->precio}}$</td>
                                            </tr>
                                       @endforeach
                                        </tbody>
                                    </table> 
                                    <br>
                                        <div style="text-align:right;font-size: 20px;">
                                   <b>Total:</b> {{$p->total_precio}}$
                                </div>
                                </td>
                                </tr>
                                
                                     @endforeach
                                </tbody>
                            </table>
                   
                        </div>
                    </div>
                </div>
           </div> 
                  <div class="row">
                <div class="col s12">
                    <div class="card  green lighten-3">
                        <div class="card-content white-text">
                            <span class="card-title">Mis Pedidos Entregados</span>
                        </div>
                        <div class="card-action">
                            <table class="centered">
                                <thead>
                                    <tr>
                                        <th>Número</th>
                                        <th>Cliente</th>
                                        <th>Número de contacto</th>
                                        <th>Dirección</th>
                                        <th>Fecha de entrega</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($entregadas as $p)
                                    <tr>
                                        <td>{{$p->numero_pedido}}</td>
                                        <td>{{$p->nombre_cliente}}</td>
                                        <td>{{$p->numero_contacto}}</td>
                                        <td>{{$p->direccion}}</td>

                                        <td> {{ \Carbon\Carbon::parse($p->hora_entrega)->format('j F, Y g:i A') }}</td>
                                        <td><a id={{$p->id}} style="margin-right: 10px;" class="detalles waves-effect waves-light btn-small green darken-1"><i class="material-icons">add_circle_outline</i></a>

                                        </td>
                                    </tr>
                                    <tr style="display:none;" id="pedido{{ $p->id }}">
                                        <td></td>
                                  <td colspan="4"> <table class="centered">
                                        <thead>
                                            <tr>
                                                <th class="producto" >Producto</th>
                                                <th class="producto">Descripción</th>
                                                <th>Comentarios</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($p->pedido_detalle as $detalles)
                                            <tr>

                                                <td class="producto">{{$detalles->producto->nombre}}</td>
                                                <td class="producto">{{$detalles->producto->descripcion}} </td>
                                                <td>       
                                                   <div style="padding:0 50px 0 50px">
                                                <input disabled value="{{$detalles->comentarios}}" id="comentario" type="text" class="form-control" name="comentario{{$detalles->id}}" value="{{ old('email') }}">
                   
                                            </div> 
                                             </td>
                                                <td class="cantidad">
                                                 
                                                    <div> {{ $detalles->cantidad}}  </div>

                                                  </td>

                                                <td>{{$detalles->precio}}$ </td>
                                            </tr>
                                       @endforeach
                                        </tbody>
                                    </table> 
                                    <br>
                                        <div style="text-align:right;font-size: 20px;">
                                   <b>Total:</b> {{$p->total_precio}}$
                                </div>
                                </td>
                                </tr>
                                
                                     @endforeach
                                </tbody>
                            </table>
                   
                        </div>
                    </div>
                </div>
           </div> 
               

        </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

   <script type="text/javascript">

    $(".detalles").click(function(event) {
        event.preventDefault();

        var id = 'pedido'+this.id;
        var pedido = $(id).val() + "";
        if($('#pedido'+this.id).is(':visible')){
            document.getElementById(id).style.display="none"
            console.log($('#pedido'+this.id))
            document.getElementById(this.id).innerHTML='<i class="material-icons">add_circle_outline</i>'

        }else{
          document.getElementById(id).style.display="table-row"
           document.getElementById(this.id).innerHTML='<i class="material-icons">remove_circle_outline</i>'
          }
});
      </script>
@endsection