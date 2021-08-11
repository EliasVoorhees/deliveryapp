

<?php $__env->startSection('content'); ?>

        <div class="container">
                <?php if( session('message') ): ?>
                <div class="alert alert-<?php echo e(session('type')); ?> alert-dismissible show">
                    <strong><?php echo e(session('message')); ?></strong>
                </div>
                <?php endif; ?>

       <br>
       <div class="row">
              <div class="col s12">
                <span class="card-title"><a class="waves-effect waves-light btn-small green darken-1" href="<?php echo e(route('productos.lista')); ?>"> Volver </a>  </div>
        </div>

            <div class="row">
                <div class="col s12">
                    <div class="card blue-grey darken-1">

                        <div class="card-content white-text">
                                <span class="card-title">Crear Producto</span>
                        </div>

                        <div class="card-content grey lighten-4">
                              <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                            <div id="role">

                           

                            <form action= " <?php echo e(route('admin.storeProduct')); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>

                            <label>
                               <b> Nombre del Producto </b>
                                <input value= "<?php echo e(old('nombre')); ?>" type= "text" name ="nombre" required> </input>
                            </label>
                            <br> <br>
                            <label>
                               <b> Descripción del Producto </b>
                               <br> <br>
                                <textarea  name ="descripcion" required><?php echo e(old('descripcion')); ?> </textarea>
                            </label>        
                            <br> <br>
                            <label>
                               <b> Tipo de Producto </b>
                               <select name="type" id="tipo" onchange="selectPizza()">
                                <option <?php echo e(old('type') == "pizza"  ? 'selected' : ''); ?> value="pizza">Pizza</option>
                                <option <?php echo e(old('type') == "bebida"  ? 'selected' : ''); ?> value="bebida">Bebida</option>
                                </select>
                            </label>
                            <br> 
                            <label>
                               <b> Precio del Producto </b>
                                <input value= "<?php echo e(old('precio')); ?>" step="any" type= "number" name ="precio" required> </input>
                            </label>
                            <br> <br>
                            <label id="selectPizzaT">
                               <b> Tamaño de la Pizza </b>
                               <select name="size">
                                <option <?php echo e(old('size') == "Pequeña"  ? 'selected' : ''); ?>  value="Pequeña">Pequeña</option>
                                <option <?php echo e(old('size') == "Mediana"  ? 'selected' : ''); ?> value="Mediana">Mediana</option>
                                <option <?php echo e(old('size') == "Grande"  ? 'selected' : ''); ?> value="Grande">Grande</option>
                                </select>
                            </label>
                            <br> 
                            <label>
                            <b> Imagen del producto:   </b> 
                                <input type= "file" accept=".png, .jpg, .jpeg" name ="image" required> </input>
                            </label>
                            <br> <br>
                                <label>
                            <b> ¿Producto disponible? </b>         </label>
                                 <select name="available">
                                    <option <?php echo e(old('available') == "1"  ? 'selected' : ''); ?>   value="1">Si</option>
                                      <option <?php echo e(old('available') == "2"  ? 'selected' : ''); ?>  value="2">No</option>
                                        </select>
                     
                            <br> 
                            <div id="selectPizza">
                                <label>
                            <b> Agregar a Pizza </b>         </label>
                             <select name="pizza">
                                <?php $__currentLoopData = $pizzas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pizza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e(old('pizza') == $pizza->id  ? 'selected' : ''); ?>  value="<?php echo e($pizza->id); ?>"><?php echo e($pizza->nombre); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            </div>
                            <br> 
                                 <button class="btn waves-effect waves-light green darken-2" type="submit" name="action"> Crear Producto
                            </button>
                            </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

   <script type="text/javascript">

        selectPizza();
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



    </script> 
                


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\deliveryapp\app\resources\views/createProduct.blade.php ENDPATH**/ ?>