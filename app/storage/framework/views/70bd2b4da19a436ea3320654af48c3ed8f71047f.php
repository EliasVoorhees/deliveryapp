

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
                            <span class="card-title">Crear Pizza</span>
                        </div>

                        <div class="card-content grey lighten-4">
                            <div id="role">

                           

                            <form action= " <?php echo e(route('admin.storePizza')); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>

                            <label>
                               <b> Nombre de la Pizza </b>
                                <input type= "text" name ="name"> </input>
                            </label>
                            <br> <br>
                            <label>
                               <b> Descripción de la Pizza</b>
                               <br> <br>
                                <textarea name ="description"> </textarea>
                            </label>        
                            <br> <br>
                            <label>
                            <b> ¿Producto disponible? </b>         </label>
                                 <select name="available">
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
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