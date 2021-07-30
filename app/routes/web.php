<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});



Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Auth::routes();


Route::prefix('repartidor')->middleware('repartidor')->group(function (){
  Route::get('/', function () { return view('manageOrder');});
});

Route::prefix('admin')->middleware('admin')->group(function (){
  Route::get('/', [UserController::class, 'index'])->name('home');

});

Route::prefix('users')->middleware('admin')->group(function (){
    Route::get("/", [UserController::class, 'index'])->name('users.index');
    Route::get("/create", [UserController::class, 'create'])->name('users.create');
    Route::post("/store",  [UserController::class, 'store'])->name('users.store');
    Route::get("/{id}",  [UserController::class, 'show'])->name('users.show');
    Route::get("/edit/{id}",  [UserController::class, 'edit'])->name('users.edit');
    Route::post("/update/{id}",  [UserController::class, 'update'])->name('users.update');
    Route::get("/delete/{id}",  [UserController::class, 'delete'])->name('users.destroy');
});

Route::get("/menu", [ProductoController::class, 'index'])->name('productos.index');

Route::prefix('menu')->middleware('admin')->group(function (){
    Route::get("/create", [ProductoController::class, 'create'])->name('productos.create');
    Route::post("/store",  [ProductoController::class, 'store'])->name('productos.store');
    Route::get("/{id}",  [ProductoController::class, 'show'])->name('productos.show');
    Route::get("/edit/{id}",  [ProductoController::class, 'edit'])->name('productos.edit');
    Route::post("/update/{id}",  [ProductoController::class, 'update'])->name('productos.update');
    Route::get("/delete/{id}",  [ProductoController::class, 'delete'])->name('productos.destroy');
});

Route::prefix('pedido')->group(function (){
    Route::get("/", [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get("/create", [PedidoController::class, 'create'])->name('pedidos.create');
    Route::post("/store",  [PedidoController::class, 'store'])->name('pedidos.store');
    Route::get("/{id}",  [PedidoController::class, 'show'])->name('pedidos.show');
    Route::get("/edit/{id}",  [PedidoController::class, 'edit'])->middleware(['admin', 'repartidor'])->name('pedidos.edit');
    Route::post("/update/{id}",  [PedidoController::class, 'update'])->middleware(['admin', 'repartidor'])->name('pedidos.update');
    Route::get("/delete/{id}",  [PedidoController::class, 'delete'])->name('pedidos.destroy')->middleware('admin');
});
