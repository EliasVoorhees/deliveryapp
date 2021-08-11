@extends('layouts.app')

@section('content')
<style>

     input {
      color: black !important;
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
                <div>
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                            <span class="card-title">Pedidos</span> 

                        </div>
                  
                        <div class="card-content grey lighten-4">
                          <div class="row">
    <div class="col s2">  <input type="text" name="numero" id="numero" class="form-control" placeholder="Número" /></div>
      <div class="col s2">  <input type="text" name="repartidor" id="repartidor" class="form-control" placeholder="Repartidor" /></div>
        <div class="col s2">          
            <select name="estado"  id="estado">
                 <option value="" selected >Estado</option>
                <option  value="En Proceso">En Proceso</option>
             <option value="En Camino">En Camino</option>
             <option value="Entregado">Entregado</option>
                </select></div>
          <div class="col s2">  <input type="text" name="desde" id="desde" class="datepicker" placeholder="Desde" /></div>
            <div class="col s2">  <input type="text" name="hasta" id="hasta" class="datepicker" placeholder="Hasta" /></div>
     </div>
                            <div id="role">
                                <table class="centered">
                                <thead>
                                    <tr>
                                        <th>Número</th>
                                        <th>Cliente</th>
                                        <th>Estado</th>
                                        <th>Repartidor</th>
                                        <th>Fecha de pedido</th>
                                        <th>Fecha de entrega</th>
                                        <th>Monto</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="total_pedidos">
                                
                                </tbody>
                            </table>
                                   <br>
                        

                                 <div id="total" style="text-align:right;font-size: 20px;">
                                   <b>Total:</b>
                                </div>

                                      <a class="descargar waves-effect waves-light btn-small green darken-1"><i class="material-icons"> file_download </i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          
            </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

   <script type="text/javascript">
     $(document).ready(function(){

         fetch_customer_dataP();
      $('.datepicker').datepicker({
          autoClose: true,
          showClearBtn: true,
        });

         function fetch_customer_dataP(query = '')
         {
        let estado = $('#estado').val();
        let numero = $('#numero').val();
        let repartidor= $('#repartidor').val();
        let desde = $('#desde').val();
        let hasta = $('#hasta').val();
        console.log(repartidor);
          $.ajax({
           url:"{{ route('pedidos.buscar') }}",
           type:'GET',
           data:{query:query,estado:estado,numero:numero,repartidor:repartidor,desde:desde,hasta:hasta},
           success:function(data)
           {
            $('#total_pedidos').html(data.pedidos_data);
            $('#total').html(data.total);
           }
          })
         }

              function fetch_customer_dataD(query = '')
         {
         var url = "{{ route('pedidos.descargar') }}?" + $.param(query);
        let estado = $('#estado').val();
        let numero = $('#numero').val();
        let repartidor= $('#repartidor').val();
        let desde = $('#desde').val();
        let hasta = $('#hasta').val();
        var query = {
        estado: $('#estado').val(),
        numero: $('#numero').val(),
        repartidor: $('#repartidor').val(),
         desde: $('#desde').val(),
         hasta: $('#hasta').val(),
          }
         var url = "{{ route('pedidos.descargar') }}?" + $.param(query);
          $.ajax({
           url:"{{ route('pedidos.descargar') }}" ,
           type:'GET',
           data:{query:query,estado:estado,numero:numero,repartidor:repartidor,desde:desde,hasta:hasta},
           success:function(data)
           {
             window.location = url ;
           }
          })
         }

         $(document).on('keyup', '#numero', function(){
            fetch_customer_dataP();
         });

           $(document).on('keyup', '#repartidor', function(){
            fetch_customer_dataP();
         });

         $(document).on('change', '#estado', function(){
            fetch_customer_dataP();
         });

         $(document).on('change', '#desde', function(){
            fetch_customer_dataP();
         });

        $(document).on('change', '#hasta', function(){
            fetch_customer_dataP();
         });


        $(document).on('click', '.descargar', function(){
            fetch_customer_dataD();
         });


          $(document).on('click', '.detalles', function(event) {
        event.preventDefault();

        var id = 'pedido'+this.id;
        var id2 = 'pedidoD'+this.id;
        var pedido = $(id).val() + "";
        if($('#pedido'+this.id).is(':visible')){
            document.getElementById(id).style.display="none"
            document.getElementById(id2).style.display="none"
            console.log($('#pedido'+this.id))
            document.getElementById(this.id).innerHTML='<i class="material-icons">add_circle_outline</i>'

        }else{
          document.getElementById(id).style.display="table-row"
           document.getElementById(id2).style.display="table-row"
           document.getElementById(this.id).innerHTML='<i class="material-icons">remove_circle_outline</i>'
          }
});



        });

   
      </script>
@endsection
