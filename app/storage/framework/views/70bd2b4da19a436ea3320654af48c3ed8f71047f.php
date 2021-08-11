

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
                            <span class="card-title">Crear Pizza</span>
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

                           

                            <form action= " <?php echo e(route('admin.storePizza')); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>

                            <label>
                               <b> Nombre de la Pizza </b>
                                <input value= "<?php echo e(old('nombre')); ?>" type= "text" name ="nombre"> </input>
                            </label>
                            <br> <br>
                            <label>
                               <b> Descripción de la Pizza</b>
                               <br> <br>
                                <textarea name ="descripcion"> <?php echo e(old('descripcion')); ?></textarea>
                            </label>        
                            <br> <br>
                            <label>
                            <b> ¿Producto disponible? </b>         </label>
                             <select name="available">
                                    <option <?php echo e(old('available') == "1"  ? 'selected' : ''); ?>   value="1">Si</option>
                                      <option <?php echo e(old('available') == "2"  ? 'selected' : ''); ?>  value="2">No</option>
                                        </select>
                
                            <br> 
                                <button class="btn waves-effect waves-light green darken-2" type="submit" name="action"> Crear Pizza
                            </button>
                            </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\deliveryapp\app\resources\views/createPizza.blade.php ENDPATH**/ ?>