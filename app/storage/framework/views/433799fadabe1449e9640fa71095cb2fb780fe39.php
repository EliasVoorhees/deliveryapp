

<?php $__env->startSection('content'); ?>
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
                                    <a  type="submit" href="<?php echo e(route('pedidos.index')); ?>" class="waves-effect waves-light btn-small green darken-3">Realizar Pedido</a>
                  </div> 

                     <form role="form" action="<?php echo e(route('pedidos.consultar')); ?>"  method="post" enctype="multipart/form-data">
                                   <?php echo csrf_field(); ?>
                    <div class="input-field col s3">
                          <input name="pedido" id="pedido" type="text" class="validate">
                    <label for="pedido">Consultar Pedido</label>
                    </div>

                     <button  style="margin-top:25px;" class="btn waves-effect waves-light green darken-2" type="submit" name="action">Consultar
                   </button>
                    </form>
            
            </div>
      <div class="row">
    <div class="col s12">  <input type="text" name="search" id="search" class="form-control" placeholder="Buscar en el menu" /></div>
     </div>
            <div class="row">
              <div class="row">
                 <div class="col s12"><h5>Pizzas</h5></div>
                   </div>
                    <div id="total_records" class="row">
           
                       </div>

                    <div class="row">
                      <div class="col s12"><h5>Bebidas</h5>
                      </div>
                      </div>
                    <div class="row" id="total_records2">
                      
                    </div>
         
            </div>
        </div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

   <script type="text/javascript">

                 $(document).ready(function(){

         fetch_customer_data();


         function fetch_customer_data(query = '')
         {

          $.ajax({
           url:"<?php echo e(route('productos.buscar')); ?>",
           type:'GET',
           data:{query:query},
           success:function(data)
           {
            $('#total_records').html(data.pizza_data);
            $('#total_records2').html(data.bebida_data);

            $('select').formSelect();
           }
          })
         }

         $(document).on('keyup', '#search', function(){
          var query = $(this).val();
          fetch_customer_data(query);
         });

            $(document).on('click','.add', function postinput(event){
        event.preventDefault();
       console.log("aca");
        var id = '#producto'+this.id;
        var producto = $(id).val() + "";
        var urlText = "<?php echo e(route('pedidos.add', ['id' => ":producto"])); ?>";
        urlText = urlText.replace(':producto', producto);
      if(producto)
            $.ajax({
          url: urlText,
          type:"GET",
          data:{
            "_token": "<?php echo e(csrf_token()); ?>",
            producto:producto,
          },
          success:function(response){
            window.location.href = "pedido";
          },
         });
        });

        });

       function selectPizza(){
        var x = document.getElementById("selectPizza");
        var tipo = document.getElementById("tipo");

        
       
        if (tipo.value === "pizza") {
                x.style.display = "block";
        } else {
                x.style.display = "none";
        }
       
       var y = document.getElementById("selectPizzaT");

        if (tipo.value === "pizza") {
                y.style.display = "block";
        } else {
                y.style.display = "none";
        }

       
   }

        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();

            
        }); 

    </script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\deliveryapp\app\resources\views/welcome.blade.php ENDPATH**/ ?>