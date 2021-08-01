

<?php $__env->startSection('content'); ?>
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
                <?php if( session('message') ): ?>
                <div class="alert alert-<?php echo e(session('type')); ?> alert-dismissible show">
                    <strong><?php echo e(session('message')); ?></strong>
                </div>
                <?php endif; ?>
         <br>
             
            <div class="row">
                <div class="col s12">
                <div>
                <a  type="submit" href="<?php echo e(route('productos.index')); ?>" class="waves-effect waves-light btn-small green darken-3">Volver al menu</a>
                  </div> <br>
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Pedido</span> 
                        </div>

                        <div class="card-content grey lighten-4">
                            <div id="role">
                                  <div style="font-size: 20px;">
                                   <b>Estado:</b> <?php echo e($pedido->estado); ?> 
                                </div>
                                 <br>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input disabled class="cambiar" value="<?php echo e($pedido->nombre_cliente); ?>" name="name" id="name" type="text" class="validate">
                                        <label for="name">Nombre</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input  disabled class="cambiar" value="<?php echo e($pedido->numero_contacto); ?>" name="telefono" id="telefono" type="number" class="validate">
                                        <label for="telefono">Teléfono</label>
                                    </div>
                                </div>
                                <div class="row">
                                      <div  class="input-field col s12">
                                        <input disabled class="cambiar" value="<?php echo e($pedido->direccion); ?>" name="direccion" id="direccion" type="text" class="validate">
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
                                             <?php $__currentLoopData = $pedido->pedido_detalle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td class="producto"><?php echo e($detalles->producto->nombre); ?></td>
                                                <td class="producto"><?php echo e($detalles->producto->descripcion); ?> </td>
                                                <td>       
                                                   <div style="padding:0 50px 0 50px">
                                                <input disabled value="<?php echo e($detalles->comentarios); ?>" id="comentario" type="text" class="form-control" name="comentario<?php echo e($detalles->id); ?>" value="<?php echo e(old('email')); ?>">
                   
                                            </div> 
                                             </td>
                                                <td class="cantidad">
                                                 
                                                    <div> <?php echo e($detalles->cantidad); ?>  </div>

                                                  </td>

                                                <td><?php echo e($detalles->precio); ?> </td>
                                            </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>


                                <br>
                        

                                 <div style="text-align:right;font-size: 20px;">
                                   <b>Total:</b> <?php echo e($pedido->total_precio); ?> 
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
            "_token": "<?php echo e(csrf_token()); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\deliveryapp\app\resources\views/pedidos/consultar.blade.php ENDPATH**/ ?>