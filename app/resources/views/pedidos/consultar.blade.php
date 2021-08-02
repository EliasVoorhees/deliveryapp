@extends('layouts.app')

@section('content')
<style>
    .producto{
        width: 20%;
       text-align: left !important;
    }
    input {
      color: black !important;
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
                <a  type="submit" href="{{route('productos.index')}}" class="waves-effect waves-light btn-small green darken-3">Volver al menu</a>
                  </div> <br>
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Pedido</span> 
                        </div>

                        <div class="card-content grey lighten-4">
                            <div id="role">
                                  <div style="font-size: 20px;">
                                   <b>Estado:</b> {{$pedido->estado}} 
                                </div>
                                 <br>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input disabled class="cambiar" value="{{$pedido->nombre_cliente}}" name="name" id="name" type="text" class="validate">
                                        <label for="name">Nombre</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input  disabled class="cambiar" value="{{$pedido->numero_contacto}}" name="telefono" id="telefono" type="number" class="validate">
                                        <label for="telefono">Teléfono</label>
                                    </div>
                                </div>
                                <div class="row">
                                      <div  class="input-field col s12">
                                        <input disabled class="cambiar" value="{{$pedido->direccion}}" name="direccion" id="direccion" type="text" class="validate">
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
                                   <b>Total:</b> {{$pedido->total_precio}}$ 
                                </div>

                                    <br>

                     
                            </div>
                               
                        
                        </div>
                    </div>
                </div>
            </div>


        </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

   <script type="text/javascript">

       $(".cambiar").on('change', function postinput(event){
        event.preventDefault();
        let name = $('#name').val();
        let telefono = $('#telefono').val();
        let direccion= $('#direccion').val();

        $.ajax({
          url: "/deliveryapp/app/public/pedido/crearSession",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            name:name,
            telefono:telefono,
            direccion:direccion,
          },
          success:function(response){
            console.log(response);
          },
         });
        });
      </script>
@endsection
