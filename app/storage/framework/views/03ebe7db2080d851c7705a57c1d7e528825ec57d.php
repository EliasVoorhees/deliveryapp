<?php $__env->startSection('content'); ?>

        <div class="container">
                <?php if( session('message') ): ?>
                <div class="alert alert-<?php echo e(session('type')); ?> alert-dismissible show">
                    <strong><?php echo e(session('message')); ?></strong>
                </div>
                <?php endif; ?>
            <div class="row">
                <div class="col s12"><h4>Administración</h4></div>  
           
            
         <div class="col s12">
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button  style="margin-top:25px;" class="btn waves-effect waves-light green darken-2" type="submit" name="action">
                            <?php echo e(__('Logout')); ?>

                        </button>
            </div>
 </div>
            <div class="row">
                <div class="col s12">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Usuarios</span> <!--USER & ROLE-->
                        </div>
                        
                        <div class="card-content grey lighten-4">
                          
                            <div id="role">
                                <table class="centered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Rol</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($user->id); ?></td>
                                            <td><?php echo e($user->name); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td><?php echo e($user->tipo); ?></td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <br>
                                <div style="text-align:right; margin-right: 12px;">
                                    <a   href="<?php echo e(route('users.create')); ?>" class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">person_add</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          
            </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\deliveryapp\app\resources\views/home.blade.php ENDPATH**/ ?>