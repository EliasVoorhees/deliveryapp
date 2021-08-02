@extends('layouts.app')

@section('content')
<style>
    .card-contentPizza{
        height: 225px;
    }
    
 </style>
        <div class="container">
            <div class="row" style="margin-bottom:0;">
                <div class="col s12"><h4>Bienvenido</h4></div>
                <div class="col s12"><h6>¿Qué desea ordenar?</h6></div>   
                  <div  style="text-align:right;">
                                    <a  type="submit" href="{{route('pedidos.index')}}" class="waves-effect waves-light btn-small green darken-3">Realizar Pedido</a>
                  </div> 

                     <form role="form" action="{{ route('pedidos.consultar') }}"  method="post" enctype="multipart/form-data">
                                   @csrf
                    <div class="input-field col s3">
                          <input name="pedido" id="pedido" type="text" class="validate">
                    <label for="pedido">Consultar Pedido</label>
                    </div>

                     <button  style="margin-top:25px;" class="btn waves-effect waves-light green darken-2" type="submit" name="action">Consultar
                   </button>
                    </form>
            
            </div>
           
            <div class="row">
              <div class="row">
                 <div class="col s12"><h5>Pizzas</h5></div>
                   </div>
                    <div class="row">
                          @foreach($pizzas as $p)
                        <div class="col s4">
                            <div class="card">
                                <div class="card-image">
                                  @php
                                    $link = $p->productos[0]->image;
                                @endphp
                                  <img src="{{ asset("img/pizza.png") }}"/>
                                    <a id={{$p->id}} class="add btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                                </div>
                                <div class="card-content card-contentPizza">
                                    <span class="card-title">{{$p->nombre}}</span>
                                    <p>{{$p->descripcion}} </p>
                                    <div class="row">
                                        <div class="input-field col s12"> 
                                            <select id="producto{{ $p->id }}">
                                                <option value="" disabled>Tamaño</option>
                                                @foreach($p->productos->where('disponible', '1') as $t)
                                                <option  selected value="{{$t->id}}">{{$t->tamaño}} {{$t->precio}}$</option>
                                                  @endforeach
                                            </select>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                          @endforeach
                       </div>

                    <div class="row">
                      <div class="col s12"><h5>Bebidas</h5>
                      </div>
                      </div>
                    <div class="row">
                        @foreach($bebidas as $b)
                        <div class="col s4">
                            <div class="card">
                                <div class="card-image Bebida">
                                     @php
                                    $link = $b->image;
                                @endphp
                                  <img src="{{  asset("img/pepsi.png") }}"/>                                    <a href="{{route('pedidos.add', ['id' => $b->id])}}"  class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title">{{$b->nombre}}</span>
                                    <p>{{$b->precio}}$</p>
                                </div>
                            </div>
                        </div>
                         @endforeach
                    </div>
         
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

   <script type="text/javascript">

       $(".add").on('click', function postinput(event){
        event.preventDefault();

        var id = '#producto'+this.id;
        var producto = $(id).val() + "";
        var urlText = "{{route('pedidos.add', ['id' => ":producto"])}}";
        urlText = urlText.replace(':producto', producto);
      if(producto)
            $.ajax({
          url: urlText,
          type:"GET",
          data:{
            "_token": "{{ csrf_token() }}",
            producto:producto,
          },
          success:function(response){
          window.location.href = "pedido";
          },
         });
        });

      </script>
@endsection