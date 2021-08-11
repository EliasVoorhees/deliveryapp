<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/", [ProductoController::class, 'index']);
Route::get("/home", [ProductoController::class, 'index']);

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Auth::routes();


Route::prefix('repartidor')->middleware('repartidor')->group(function (){
  Route::get('/', [PedidoController::class, 'ordenes'])->name('repartidor');
});

Route::prefix('admin')->middleware('admin')->group(function (){
  Route::get('/', [UserController::class, 'index'])->name('home');
  Route::get('/createProduct', [UserController::class, 'createProduct'])->name('admin.createProduct');
  Route::post('/product', [UserController::class, 'storeProduct'])->name('admin.storeProduct');
  Route::get('/createPizza', [UserController::class, 'createPizza'])->name('admin.createPizza');  
  Route::post('/pizza', [UserController::class, 'storePizza'])->name('admin.storePizza');

});

Route::prefix('users')->middleware('admin')->group(function (){
    Route::get("/", [UserController::class, 'index'])->name('users.index');
    Route::get("/create", [UserController::class, 'create'])->name('users.create');
    Route::post("/store",  [UserController::class, 'store'])->name('users.store');
    Route::get("/{id}",  [UserController::class, 'show'])->name('users.show');
    Route::get("/edit/{id}",  [UserController::class, 'edit'])->name('users.edit');
    Route::post("/update/{id}",  [UserController::class, 'update'])->name('users.update');
    Route::get("/delete/{id}",  [UserController::class, 'delete'])->name('users.destroy');
    Route::get("/activo/{id}",  [UserController::class, 'activo'])->name('users.activo');
});

Route::get("/menu", [ProductoController::class, 'index'])->name('productos.index');
Route::get("/buscar", [ProductoController::class, 'buscar'])->name('productos.buscar');

Route::prefix('producto')->middleware('admin')->group(function (){

Route::get("/lista", [ProductoController::class, 'lista'])->name('productos.lista');
Route::get("/ordenar",  [ProductoController::class, 'ordenar'])->name('productos.ordenar');
Route::get("/ordenarB",  [ProductoController::class, 'ordenarB'])->name('productos.ordenarB');
    Route::get("/create", [ProductoController::class, 'create'])->name('productos.create');
    Route::post("/store",  [ProductoController::class, 'store'])->name('productos.store');
    Route::get("/{id}",  [ProductoController::class, 'show'])->name('productos.show');
    Route::get("/edit/{id}",  [ProductoController::class, 'edit'])->name('productos.edit');
    Route::post("/update/{id}",  [ProductoController::class, 'update'])->name('productos.update');
    Route::get("/delete/{id}",  [ProductoController::class, 'delete'])->name('productos.destroy');
});
Route::prefix('pedido')->group(function (){
    Route::get("/", [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get("/historial", [PedidoController::class, 'historial'])->name('pedidos.historial')->middleware('admin');
    Route::get("/buscar", [PedidoController::class, 'buscar'])->name('pedidos.buscar')->middleware('admin');
     Route::get("/descargar", [PedidoController::class, 'descargar'])->name('pedidos.descargar')->middleware('admin');
    Route::get("/create", [PedidoController::class, 'create'])->name('pedidos.create');
    Route::post("/store",  [PedidoController::class, 'store'])->name('pedidos.store');
     Route::post("/storeEdit",  [PedidoController::class, 'storeEdit'])->name('pedidos.storeEdit')->middleware('admin');
     Route::get("/editar/{id}",  [PedidoController::class, 'editar'])->name('pedidos.editar')->middleware('admin');
Route::post("/consultar",  [PedidoController::class, 'consultar'])->name('pedidos.consultar');
Route::post("/crearSession",  [PedidoController::class, 'crearSession'])->name('pedidos.crearSession');
    Route::get("/{id}",  [PedidoController::class, 'show'])->name('pedidos.show');
    Route::get("/add/{id}",  [PedidoController::class, 'addProducto'])->name('pedidos.add');
    Route::get("/restar/{id}",  [PedidoController::class, 'restar'])->name('pedidos.restar');
  Route::get("/addE/{id}",  [PedidoController::class, 'addProductoE'])->name('pedidos.addE');
  Route::get("/restarE/{id}",  [PedidoController::class, 'restarE'])->name('pedidos.restarE');
    Route::get("/edit/{id}",  [PedidoController::class, 'edit'])->middleware(['admin', 'repartidor'])->name('pedidos.edit');
    Route::post("/update/{id}",  [PedidoController::class, 'update'])->middleware(['admin', 'repartidor'])->name('pedidos.update');
    Route::get("/delete/{id}",  [PedidoController::class, 'delete'])->name('pedidos.destroy')->middleware('admin');
    Route::get("/encamino/{id}",  [PedidoController::class, 'encamino'])->name('pedidos.encamino');
    Route::get("/entregado/{id}",  [PedidoController::class, 'entregado'])->name('pedidos.entregado');
});
