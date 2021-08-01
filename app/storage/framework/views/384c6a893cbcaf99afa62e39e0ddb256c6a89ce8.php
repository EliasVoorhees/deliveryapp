

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
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                                <span class="card-title">Crear Producto</span>
                        </div>

                        <div class="card-content grey lighten-4">
                            <div id="role">

                           

                            <form action= " <?php echo e(route('admin.storeProduct')); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>

                            <label>
                               <b> Nombre del Producto </b>
                                <input type= "text" name ="name"> </input>
                            </label>
                            <br> <br>
                            <label>
                               <b> Descripción del Producto </b>
                               <br> <br>
                                <textarea name ="description"> </textarea>
                            </label>        
                            <br> <br>
                            <label>
                               <b> Tipo de Producto </b>
                               <select name="type" onchange="selectPizza()">
                                <option value="pizza">Pizza</option>
                                <option value="bebida">Bebida</option>
                                </select>
                            </label>
                            <br> 
                            <label>
                               <b> Precio del Producto </b>
                                <input type= "number" name ="price"> </input>
                            </label>
                            <br> <br>
                            <label id="selectPizzaT">
                               <b> Tamaño de la Pizza </b>
                               <select name="size">
                                <option value="Pequeña">Pequeña</option>
                                <option value="Mediana">Mediana</option>
                                <option value="Grande">Grande</option>
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
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                     
                            <br> 
                            <div id="selectPizza">
                                <label>
                            <b> Agregar a Pizza </b>         </label>
                             <select name="pizza">
                                <?php $__currentLoopData = $pizzas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pizza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($pizza->id); ?>"><?php echo e($pizza->nombre); ?></option>
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

                


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\deliveryapp\app\resources\views/createProduct.blade.php ENDPATH**/ ?>