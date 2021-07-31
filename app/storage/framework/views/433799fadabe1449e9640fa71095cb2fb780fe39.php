

<?php $__env->startSection('content'); ?>
<style>
    .card-contentPizza{
        height: 225px;
    }
    
 </style>
        <div class="container">
            <div class="row">
                <div class="col s12"><h4>Bienvenido</h4></div>
                <div class="col s12"><h6>¿Qué desea ordenar?</h6></div>        
            </div>
            <div class="row">
               <h5>Pizzas</h5>
                    <div class="row">
                          <?php $__currentLoopData = $pizzas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col s4">
                            <div class="card">
                                <div class="card-image">
                                    <img src="<?php echo e(asset("img/productos/pizza.png")); ?>">
                                    <a id=<?php echo e($p->id); ?> class="add btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                                </div>
                                <div class="card-content card-contentPizza">
                                    <span class="card-title"><?php echo e($p->nombre); ?></span>
                                    <p><?php echo e($p->descripcion); ?> </p>
                                    <div class="row">
                                        <div class="input-field col s12"> 
                                            <select id="producto<?php echo e($p->id); ?>">
                                                <option value="" disabled selected>Tamaño</option>
                                                <?php $__currentLoopData = $p->productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($t->id); ?>"><?php echo e($t->tamaño); ?> <?php echo e($t->precio); ?>$</option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </div>
                    <h5>Bebidas</h5>
                    <div class="row">
                        <?php $__currentLoopData = $bebidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col s4">
                            <div class="card">
                                <div class="card-image">
                                    <img src="img/fanta.png">
                                    <a href="<?php echo e(route('pedidos.add', ['id' => $b->id])); ?>"  class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title"><?php echo e($b->nombre); ?></span>
                                    <p><?php echo e($b->precio); ?>$</p>
                                </div>
                            </div>
                        </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
         
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

   <script type="text/javascript">

       $(".add").on('click', function postinput(event){
        event.preventDefault();

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

      </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\deliveryapp\app\resources\views/welcome.blade.php ENDPATH**/ ?>