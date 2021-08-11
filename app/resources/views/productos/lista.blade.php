@extends('layouts.app')

@section('content')

<style>

     

.p-image img {
    height: 60px;
}
.ui-sortable-helper {
    display: table;
}
.container {
    width: 100%;
}


 </style>
<div class="container">
                @if( session('message') )
                <div class="alert alert-{{session('type')}} alert-dismissible show">
                    <strong>{{session('message')}}</strong>
                </div>
                @endif
 
         
     </br>  
              <div class="row">

                <span class="card-title"><a class="waves-effect waves-light btn-small green darken-1" href="{{route('home')}}"> Volver </a> 
        </div>

   <div class="row">
                   <span class="card-title"><a class="waves-effect waves-light btn-small green darken-1" href="{{route('admin.createPizza')}}"> Crear Pizza </a> <a class="waves-effect waves-light btn-small green darken-1" href = "{{route('admin.createProduct')}}"> Crear Producto </a> 
            </span> 
     
        </div>

           <div class="row">
                 <h5>Lista de productos</h5> 
           </div>


            <div class="row">
                <div>
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                            <span class="card-title">Pizzas</span> 

                        </div>
                  
                        <div class="card-content grey lighten-4">
                              <div id="role">
                                        <table class="centered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th># Pedidos</th>
                                        <th>Disponibilidad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                    <tbody id="tablecontents">
                                    @foreach($pizzas as $p)
                                       @php
                                         if($p->disponible)
                                            $estado='Disponible';
                                         else
                                          $estado='No Disponible';
                                         @endphp
                   
                                     <tr class="row1" data-id="{{ $p->id }}">
                                      <td>{{ $p->orden }}</td>
                                      <td><div class="p-image"><img src='{{asset("img/pizza.png") }}'/></div></td>  
                                        <td>{{ $p->nombre }}</td>
                                        <td>{{  $p->descripcion  }}</td>
                                         @php 
                                         $sum=0;
                                          $productos= App\Models\Producto::where('pizza_id', $p->id)->get();
                                          foreach($productos as $pr){
                                              $sum+=$pr->pedidos->sum('cantidad');
                                            }

                                          @endphp 
                                         <td>{{  $sum }}</td>
                                            <td>{{  $estado  }}</td>
                                           <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                  
                                       @if($p->productos->isNotEmpty()) 
                                       <td style="display:none;" id="pedido{{ $p->id }}">
                                        <td></td>
                                         <td></td>
                                  <td colspan=4> <table class="centered">

                                        </thead>
                                        <tbody>
                                            @foreach($p->productos as $detalles)
                                               @php
                                                   if($detalles->disponible)
                                                      $estadod='Disponible';
                                                   else
                                                    $estadod='No Disponible';
                                                   @endphp
                                            <tr>
                                                <td>{{$detalles->tamaño}} </td>
                                                <td>{{$detalles->precio}}$ </td>
                                                  <td>{{  $estadod  }}</td>
                                           <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                
                                         
                                       @endforeach
                                        </tbody>
                                    </table> 
                                 
         
                                   </td>@endif
                                </tr>
     
                                    @endforeach
                                   </tbody> 
                            </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div>
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                            <span class="card-title">Bebidas</span> 

                        </div>
                  
                        <div class="card-content grey lighten-4">
                              <div id="role">
                                        <table class="centered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th># Pedidos</th>
                                        <th>Disponibilidad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                    <tbody id="tablecontents2">
                                    @foreach($bebidas as $p)
                                              @php
                                         if($p->disponible)
                                            $estado='Disponible';
                                         else
                                          $estado='No Disponible';
                                         @endphp
                                     <tr class="row2" data-id="{{ $p->id }}">
                                     <td>{{ $p->orden }}</td>
                                      <td><div class="p-image"><img src='{{asset("img/pepsi.png") }}'/></div></td>  
                                        <td>{{ $p->nombre }}</td>
                                        <td>{{  $p->descripcion  }}</td>
                                         <td>${{  $p->precio  }}</td>
                                          <td>{{ DB::table('pedido__detalles')->where('producto_id', $p->id)->sum('cantidad') }}</td>
                                             <td>{{  $estado  }}</td>
                                           <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                      </tr>
                                    @endforeach
                                   </tbody> 
                            </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
   

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script type="text/javascript">
      $(function () {
       

        $( "#tablecontents" ).sortable({
          items: "tr.row1",
          cursor: 'move',
          opacity: 0.6,
          update: function() {
              sendOrderToServer();
          }
        });

        function sendOrderToServer() {
          var order = [];
          var token = $('meta[name="csrf-token"]').attr('content');
          $('tr.row1').each(function(index,element) {
            order.push({
              id: $(this).attr('data-id'),
              position: index+1
            });
          });
          console.log(order);
           var query = {
            order: order,
          }
         var url = "{{ route('productos.ordenar') }}?" + $.param(query);

          $.ajax({
            type:'GET',
            dataType: "json", 
            url:"{{ route('productos.ordenar') }}" ,
                data: {
              order: order,
              _token: token
            },
             success:function(data)
           {
             window.location = url ;
           }
          });
        }


        $( "#tablecontents2" ).sortable({
          items: "tr",
          cursor: 'move',
          opacity: 0.6,
          update: function() {
              sendOrderToServer2();
          }
        });

        function sendOrderToServer2() {
        //   document.getElementById(id).style.display="none"
           // console.log($('#pedido'+$(this).attr('data-id')))
           // document.getElementById($(this).attr('data-id')).innerHTML='<i class="material-icons">add_circle_outline</i>'
          var order = [];
          var token = $('meta[name="csrf-token"]').attr('content');
          $('tr.row2').each(function(index,element) {
            order.push({
              id: $(this).attr('data-id'),
              position: index+1
            });
          });
          console.log(order);
           var query = {
            order: order,
          }
         var url = "{{ route('productos.ordenarB') }}?" + $.param(query);

          $.ajax({
            type:'GET',
            dataType: "json", 
            url:"{{ route('productos.ordenarB') }}" ,
                data: {
              order: order,
              _token: token
            },
             success:function(data)
           {
             window.location = url ;
           }
          });
        }
      });


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