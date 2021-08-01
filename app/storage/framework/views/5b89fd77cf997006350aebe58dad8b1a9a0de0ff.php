

<?php $__env->startSection('content'); ?>
    <div class="container">
      
            <br>

            <div class="row">

                    

            <div class="col s12">
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button  style="margin-top:25px;" class="btn waves-effect waves-light green darken-2" type="submit" name="action">
                            <?php echo e(__('Logout')); ?>

                        </button>
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
                                <?php $__currentLoopData = $pendientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($p->numero_pedido); ?></td>
                                        <td><?php echo e($p->nombre_cliente); ?></td>
                                        <td><?php echo e($p->numero_contacto); ?></td>
                                        <td><?php echo e($p->direccion); ?></td>
                                        <td><a id=<?php echo e($p->id); ?> style="margin-right: 10px;" class="detalles waves-effect waves-light btn-small green darken-1"><i class="material-icons">add_circle_outline</i></a>
                                        <a href="<?php echo e(route('pedidos.encamino', ['id' => $p->id])); ?>" class="waves-effect waves-light btn-small green darken-1">En Camino</a>
                                        </td>
                                    </tr>
                                    <tr style="display:none;" id="pedido<?php echo e($p->id); ?>">
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
                                             <?php $__currentLoopData = $p->pedido_detalle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                   <b>Total:</b> <?php echo e($p->total_precio); ?> 
                                </div>
                                </td>
                                </tr>
                                
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <?php $__currentLoopData = $encamino; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($p->numero_pedido); ?></td>
                                        <td><?php echo e($p->nombre_cliente); ?></td>
                                        <td><?php echo e($p->numero_contacto); ?></td>
                                        <td><?php echo e($p->direccion); ?></td>
                                        <td><a id=<?php echo e($p->id); ?> style="margin-right: 10px;" class="detalles waves-effect waves-light btn-small green darken-1"><i class="material-icons">add_circle_outline</i></a>
                                        <a href="<?php echo e(route('pedidos.entregado', ['id' => $p->id])); ?>" class="waves-effect waves-light btn-small green darken-1">Entregado</a>
                                        </td>
                                    </tr>
                                    <tr style="display:none;" id="pedido<?php echo e($p->id); ?>">
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
                                             <?php $__currentLoopData = $p->pedido_detalle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                   <b>Total:</b> <?php echo e($p->total_precio); ?> 
                                </div>
                                </td>
                                </tr>
                                
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <?php $__currentLoopData = $entregadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($p->numero_pedido); ?></td>
                                        <td><?php echo e($p->nombre_cliente); ?></td>
                                        <td><?php echo e($p->numero_contacto); ?></td>
                                        <td><?php echo e($p->direccion); ?></td>

                                        <td> <?php echo e(\Carbon\Carbon::parse($p->hora_entrega)->format('j F, Y g:i A')); ?></td>
                                        <td><a id=<?php echo e($p->id); ?> style="margin-right: 10px;" class="detalles waves-effect waves-light btn-small green darken-1"><i class="material-icons">add_circle_outline</i></a>

                                        </td>
                                    </tr>
                                    <tr style="display:none;" id="pedido<?php echo e($p->id); ?>">
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
                                             <?php $__currentLoopData = $p->pedido_detalle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                   <b>Total:</b> <?php echo e($p->total_precio); ?> 
                                </div>
                                </td>
                                </tr>
                                
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                   
                        </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\deliveryapp\app\resources\views/manageOrder.blade.php ENDPATH**/ ?>