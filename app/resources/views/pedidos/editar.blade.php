@extends('layouts.app')

@section('content')
<style>
    .producto{
        width: 20%;
       text-align: left !important;
    }
    .cantidad div{   
    display: flex; 
    justify-content: space-between;
    align-content:  center;
    text-align: center;
    vertical-align: middle;
    line-height: 30px; 
    position: relative;

    }

    td, th {
    padding: 5px 5px;
    }

    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

 </style>
        <div class="container">
                @if( session('message') )
                <div class="alert alert-{{session('type')}} alert-dismissible show">
                    <strong>{{session('message')}}</strong>
                </div>
                @endif
         <br>
             
            <div class="row">
                <div class="col s12">
                <div>
                <a  type="submit" href="{{route('pedidos.historial')}}" class="waves-effect waves-light btn-small green darken-3">Volver</a>
                  </div> <br>
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Editar Pedido 
Número: {{ $pedido->numero_pedido }}</span> 
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
                                   <form role="form" action="{{ route('pedidos.storeEdit') }}" method="post" enctype="multipart/form-data">
                                   @csrf
                     <div class="row">
                          <div class="col s2">          
            <select name="estado"  id="estado">
                 <option value="" disabled >Estado</option>
                <option   {{  $pedido->estado == "En Proceso"  ? 'selected' : '' }} value="En Proceso">En Proceso</option>
             <option {{  $pedido->estado == "En Camino"  ? 'selected' : '' }} value="En Camino">En Camino</option>
             <option {{  $pedido->estado == "Entregado"  ? 'selected' : '' }}  value="Entregado">Entregado</option>
                 <option {{  $pedido->estado == "Cancelado"  ? 'selected' : '' }}  value="Cancelado">Cancelado</option>
                </select></div>
                </div>

                                <div class="row">
                                    <div class="input-field col s6">
                                    <input class="cambiar" value="{{ old('nombre') ? old('nombre') : $pedido->nombre_cliente }}"  name="nombre" id="nombre" type="text" class="validate">
                                        <label for="name">Nombre</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input  class="cambiar" value="{{ old('telefono') ? old('telefono') : $pedido->numero_contacto }}" name="telefono" id="telefono" type="number" class="validate">
                                        <label for="telefono">Teléfono</label>
                                    </div>
                                </div>
                                <div class="row">
                                      <div class="input-field col s12">
                                        <input class="cambiar" value="{{ old('direccion') ? old('direccion') : $pedido->direccion }}" name="direccion" id="direccion" type="text" class="validate">
                                        <label for="direccion">Dirección</label>
                                    </div>
                                </div>
                                <table class="centered">
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
                                             @foreach($pedido->pedido_detalle as $detalles)
                                            <tr>

                                                <td class="producto">{{$detalles->producto->nombre}}</td>
                                                <td class="producto">{{$detalles->producto->descripcion}} </td>
                                                <td>       
                                                   <div style="padding:0 50px 0 50px">
                                                <input value="{{$detalles->comentarios}}" id="comentario" type="text" class="form-control" name="comentario{{$detalles->id}}">
                   
                                            </div> 
                                             </td>
                                                <td class="cantidad">
                                                    <div> 
                                                    <a  href="{{route('pedidos.restarE', ['id' => $detalles->producto->id])}}" class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a>
                                                    <div> {{ $detalles->cantidad}}  </div>

                                                    <a href="{{route('pedidos.addE', ['id' => $detalles->producto->id])}}" class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">add</i></a></td>
                                                   </div>
                                                <td>{{$detalles->precio}}$ </td>
                                            </tr>
                                       @endforeach
                                        </tbody>
                                    </table>
                                <br>

                                <br>
                        

                                 <div style="text-align:right;font-size: 20px;">
                                   <b>Total:</b> {{$pedido->total_precio}}$
                                </div>

                                    <br>

                                <div style="text-align:right;">
                                    <button class="btn waves-effect waves-light green darken-2" type="submit" name="action">Editar
                                        </button>
                                </div>
                                </form>
                            </div>
                               
                        
                        </div>
                    </div>
                </div>
            </div>


        </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

   <script type="text/javascript">


      </script>
@endsection
