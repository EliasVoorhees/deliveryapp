

<?php $__env->startSection('content'); ?>

        <div class="container">
                <?php if( session('message') ): ?>
                <div class="alert alert-<?php echo e(session('type')); ?> alert-dismissible show">
                    <strong><?php echo e(session('message')); ?></strong>
                </div>
                <?php endif; ?>
            <div class="row">
                <div class="col s12"><h4>Welcome Admin</h4></div>
                <div class="col s12"><h6>What do you want to do?</h6></div>        
            </div>
            
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit">
                            <?php echo e(__('Logout')); ?>

                        </button>
            </form>


            <div class="row">
                <div class="col s12">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Manage <a class="waves-effect waves-light btn-small green darken-1" href="<?php echo e(route('admin.createPizza')); ?>"> Crear Pizza </a> <a class="waves-effect waves-light btn-small green darken-1" href = "<?php echo e(route('admin.createProduct')); ?>"> Crear Producto </a> </span> <!--USER & ROLE-->

                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab"><a class="active" href="#role">Menu</a></li>
                                <li class="tab"><a href="#user">Users</a></li>
                            </ul>
                        </div>
                        <div class="card-content grey lighten-4">
                            <div id="role">
                                <table class="centered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>customer</td>
                                            <td></td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>employee</td>
                                            <td></td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div style="text-align:right; margin-right: 7%;">
                                    <a class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div id="user">
                                <table class="centered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role ID</th>
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

            <div class="row">
                <div class="col s6">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Manage</span><!--UNIT, INGREDIENT & SIZE-->
                            <p></p>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab"><a href="#unit">Unit</a></li>
                                <li class="tab"><a href="#ingredient">Ingredients</a></li>
                                <li class="tab"><a class="active" href="#size">Size</a></li>
                            </ul>
                        </div>
                        <div class="card-content grey lighten-4">
                            <div id="unit">
                                <table class="centered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Symbol</th>
                                            <th>Description</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>gram</td>
                                            <td>gr</td>
                                            <td>weight on grams</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>unit</td>
                                            <td>u</td>
                                            <td>a countable quantity</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>milliliters</td>
                                            <td>ml</td>
                                            <td></td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>pinch</td>
                                            <td>pinch</td>
                                            <td>1/16 teaspoon</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div style="text-align:right; margin-right: 5px;">
                                    <a class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div id="ingredient">
                                <table class="centered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Unit ID</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>tomatoes</td>
                                            <td>common tomato</td>
                                            <td>1</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>mozzarella</td>
                                            <td>mozzarella cheese for pizza</td>
                                            <td>1</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>pepperoni</td>
                                            <td>Usually cutted in slices of 2-3 mm</td>
                                            <td>1</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>onion slices</td>
                                            <td>onion cutted in slices</td>
                                            <td>1</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>onion diced</td>
                                            <td>diced onion</td>
                                            <td>
                                                <div class="input-field col s12">
                                                    <select>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                    
                                                </div>
                                            </td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">save</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>

                                    </tbody>
                                </table>
                                <br>
                                <div style="text-align:right; margin-right: 5px;">
                                    <a class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div id="size">
                                <table class="centered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>large</td>
                                            <td>a 14 inches pizza</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>medium</td>
                                            <td>a 11 inches pizza</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div style="text-align:right; margin-right: 15px;">
                                    <a class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">add</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s6">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Manage Prices</span><!--PRICES-->
                            <p></p>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab"><a class="active" href="#pricepizza">Pizza</a></li>
                                <li class="tab"><a href="#pricedrink">Drink</a></li>              
                            </ul>
                        </div>
                        <div class="card-content grey lighten-4">
                            <div id="pricepizza">
                                <table class="centered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                            <th>Pizza ID</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td></td>
                                            <td>11.99</td>
                                            <td>3</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td></td>
                                            <td>14.99</td>
                                            <td>19</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td></td>
                                            <td>15.99</td>
                                            <td>5</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td></td>
                                            <td>12.99</td>
                                            <td>17</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div style="text-align:right; margin-right: 4%;">
                                    <a class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div id="pricedrink">
                                <table class="centered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                            <th>Drink ID</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>6</td>
                                            <td></td>
                                            <td>2.99</td>
                                            <td>1</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td></td>
                                            <td>2.99</td>
                                            <td>5</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td></td>
                                            <td>2.99</td>
                                            <td>3</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td></td>
                                            <td>2.99</td>
                                            <td>4</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div style="text-align:right; margin-right: 4%;">
                                    <a class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">add</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col s12">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Manage</span><!--PIZZA & DRINK-->
                            <p></p>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab"><a class="active" href="#pizza">Pizza</a></li>
                                <li class="tab"><a href="#drink">Drink</a></li>              
                            </ul>
                        </div>
                        <div class="card-content grey lighten-4">
                            <div id="pizza">
                                <table class="centered">    
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Size ID</th>
                                            <th>Ingredient</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2</td>
                                            <td>pepperoni</td>
                                            <td>classical pepperoni pizza</td>
                                            <td>1</td>
                                            <td>
                                                <a class="waves-effect waves-light btn modal-trigger    green darken-4" href="#modal1"><i class="material-icons">restaurant_menu</i></a>
                                                <!-- Modal Structure -->
                                                <div id="modal1" class="modal">
                                                    <div class="modal-content">
                                                        <table class="centered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Ingredient id</th>
                                                                    <th>Quantity</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>250</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>300</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>100</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>100</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>10</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>1</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>1</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>1</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <div>
                                                            <a class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">add</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>hawaiian</td>
                                            <td>this pizza has pineapple</td>
                                            <td>1</td>
                                            <td>
                                                <a class="waves-effect waves-light btn modal-trigger  green darken-4" href="#modal2"><i class="material-icons">restaurant_menu</i></a>
                                                <!-- Modal Structure -->
                                                <div id="modal2" class="modal">
                                                    <div class="modal-content">
                                                        <table class="centered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Ingredient id</th>
                                                                    <th>Quantity</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>250</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>100</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>4</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>15</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>250</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <div>
                                                            <a class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">add</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>margherita</td>
                                            <td>the most basic and essential pizza</td>
                                            <td>1</td>
                                            <td>
                                                <a class="waves-effect waves-light btn modal-trigger  green darken-4" href="#modal3"><i class="material-icons">restaurant_menu</i></a>
                                                <!-- Modal Structure -->
                                                <div id="modal3" class="modal">
                                                    <div class="modal-content">
                                                        <table class="centered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Ingredient id</th>
                                                                    <th>Quantity</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>250</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>100</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>15</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>1</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <div>
                                                            <a class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">add</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>chicken</td>
                                            <td>classic chicken pizza</td>
                                            <td>1</td>
                                            <td>
                                                <a class="waves-effect waves-light btn modal-trigger  green darken-4" href="#modal4"><i class="material-icons">restaurant_menu</i></a>
                                                <!-- Modal Structure -->
                                                <div id="modal4" class="modal">
                                                    <div class="modal-content">
                                                        <table class="centered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Ingredient id</th>
                                                                    <th>Quantity</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>250</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>100</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>15</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>200</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>10</td>
                                                                    <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                                                    <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <div>
                                                            <a class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">add</i></a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div style="text-align:right; margin-right: 2%;">
                                    <a class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div id="drink">
                                <table class="centered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Size</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Coca-Cola</td>
                                            <td>Plastic Bottle</td>
                                            <td>2 lt</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Fanta</td>
                                            <td>Plastic Bottle</td>
                                            <td>2 lt</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Sprite</td>
                                            <td>Plastic Bottle</td>
                                            <td>2 lt</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Pepsi</td>
                                            <td>Plastic Bottle</td>
                                            <td>2 lt</td>
                                            <td><a class="waves-effect waves-light btn-small green darken-1"><i class="material-icons">edit</i></a></td>
                                            <td><a class="waves-effect waves-light btn-small red darken-1"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div style="text-align:right; margin-right: 5.5%;">
                                    <a class="waves-effect waves-light btn-small green darken-3"><i class="material-icons">add</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>

        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\deliveryapp\app\resources\views/home.blade.php ENDPATH**/ ?>