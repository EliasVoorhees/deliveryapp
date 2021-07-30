@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col s12"><h4>Welcome!</h4></div>
                <div class="col s12"><h6>What do you want to order?</h6></div>        
            </div>
            <div class="row">
                <div class="col s7">
                    <div class="row">
                        <div class="col s6">
                            <div class="card">
                                <div class="card-image">
                                    <img src="img/pepperoni.png">
                                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title">Pepperoni</span>
                                    <p>Ingredients: Mozarella Cheese, Pepperoni, Onion diced, Basil, Rosemary,Pepper, Olive oil</p>
                                    <div class="row">
                                        <div class="input-field col s12"> 
                                            <select>
                                                <option value="" disabled selected>Size</option>
                                                <option value="1">Medium 11.99$</option>
                                                <option value="2">Large 14.99$</option>
                                            </select>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="card">
                                <div class="card-image">
                                    <img src="img/hawaiian.png">

                                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title">Hawaiian</span>
                                    <p>Ingredients: Mozarella Cheese, Pineapple, Ham diced, Olive oil</p>
                                    <br>
                                    <div class="row">
                                        <div class="input-field col s12"> 
                                            <select>
                                                <option value="" disabled selected>Size</option>
                                                <option value="1">Medium 11.99$</option>
                                                <option value="2">Large 14.99$</option>
                                            </select>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="card">
                                <div class="card-image">
                                    <img src="img/margherita.png">
                                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title">Margherita</span>
                                    <p>Ingredients: Mozarella Cheese, Basil, Olive oil</p>
                                    <div class="row">
                                        <div class="input-field col s12"> 
                                            <select>
                                                <option value="" disabled selected>Size</option>
                                                <option value="1">Medium 9.99$</option>
                                                <option value="2">Large 12.99$</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="card">
                                <div class="card-image">
                                    <img src="img/chicken.png">
                                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title">Chicken</span>
                                    <p>Ingredients: Mozarella Cheese, Chicken, Olive, Olive oil</p>
                                    <div class="row">
                                        <div class="input-field col s12"> 
                                            <select>
                                                <option value="" disabled selected>Size</option>
                                                <option value="1">Medium 12.99$</option>
                                                <option value="2">Large 15.99$</option>
                                            </select>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <h5>Drinks</h5>
                    <div class="row">
                        <div class="col s6">
                            <div class="card">
                                <div class="card-image">
                                    <img src="img/cocacola.png">
                                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title">Coca Cola</span>
                                    <p>2.99$</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="card">
                                <div class="card-image">
                                    <img src="img/sprite.png">
                                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title">Sprite</span>
                                    <p>2.99$</p>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="card">
                                <div class="card-image">
                                    <img src="img/fanta.png">
                                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title">Fanta</span>
                                    <p>2.99$</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="card">
                                <div class="card-image">
                                    <img src="img/pepsi.png">
                                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title">Pepsi</span>
                                    <p>2.99$</p>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="col s5">
                    <div class="row">
                        <div class="col s12">
                            <div class="card  yellow lighten-3">
                                <div class="card-content ">
                                    <span class="card-title">Your Order</span>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>margherita</td>
                                                <td><a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a></td>
                                                <td>1</td>
                                                <td><a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">add</i></a></td>
                                            </tr>
                                            <tr>
                                                <td>sprite</td>
                                                <td><a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a></td>
                                                <td>1</td>
                                                <td><a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">add</i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <form>
                                        <div class="input-field">
                                            <input id="total" type="text">
                                            <label for="total">Total</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-action right-align ">
                                    <a href="#" class="red-text">Buy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection