

<?php $__env->startSection('content'); ?>
<div class="container">
            <div class="row">
                <div class="col s12"><h4>Crear Usuario</h4></div>  
           
        
 </div>
                <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

            <div class="row">
                <div class="col s8 offset-s2">
                    <div class="card-panel green lighten-5">
                        <div class="row">
                                 <form role="form" <?php if(isset($edit)): ?> action="<?php echo e(route('users.update', $user->id)); ?>" <?php elseif( !isset($show) ): ?> action="<?php echo e(route('users.store')); ?>" <?php endif; ?> method="post" class="col s12" enctype="multipart/form-data">
                                   <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input name="nombre" id="nombre" type="text" class="validate">
                                        <label for="nombre">Nombre</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input  name="email" id="email" type="email" class="validate">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input  name="password" id="password" type="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                     <div class="input-field col s6">
                                        <select name="tipo"  id="tipo">
                                            <option value="" disabled>Choose your option</option>
                                            <option selected value="repartidor">Repartidor</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                        <label>Rol</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 center-align">
                                        <button class="btn waves-effect waves-light green darken-2" type="submit" name="action">Crear
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\deliveryapp\app\resources\views/users/create.blade.php ENDPATH**/ ?>