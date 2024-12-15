<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PizzeriaController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReservationController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





// Pizzeria route
Route::get('/pizzeria', [PizzeriaController::class, 'index']);

// Services route
Route::get('/services', [ServicesController::class, 'index']);

// Blog route
Route::get('/blog', [BlogController::class, 'index']);

// Contact route
Route::get('/contact', [ContactController::class, 'index']);

// About route
Route::get('/about', [AboutController::class, 'index']);


// Menu route
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');


// Routes pour ClientsController
Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientsController::class, 'store'])->name('clients.store');
Route::put('/clients/{client}', [ClientsController::class, 'update'])->name('clients.update');
Route::get('/clients/{client}/edit', [ClientsController::class, 'edit'])->name('clients.edit');
Route::delete('/clients/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');


// Routes pour PizzaController
Route::get('/pizzas', [PizzaController::class,'index'])->name('pizzas.index');
Route::get('/pizzas/create', [PizzaController::class, 'create'])->name('pizzas.create');
Route::post('/pizzas', [PizzaController::class, 'store'])->name('pizzas.store');
Route::put('/pizzas/{pizza}', [PizzaController::class, 'update'])->name('pizzas.update');
Route::get('/pizzas/{pizza}/edit', [PizzaController::class, 'edit'])->name('pizzas.edit');
Route::delete('/pizzas/{pizza}', [PizzaController::class, 'destroy'])->name('pizzas.destroy');
//CART
Route::get('shopping-cart',[PizzaController::class,'pizzaCart'])->name('shopping.cart');
Route::get('/pizza/{id}',[PizzaController::class ,'addPizzatoCart'])->name('addpizza.to.cart');
Route::patch('/update-shopping-cart',[PizzaController::class,'updateCart'])->name('update.shopping.cart');
Route::delete('/delete-cart-product',[PizzaController::class,'deleteProduct'])->name('delete.cart.product');

// Routes pour OrderController
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/index', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

// Routes pour ReviewController
Route::get('/review/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/review', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

// Routes pour SuggestionController
Route::get('/suggestions/create', [SuggestionController::class, 'create'])->name('suggestions.create');
Route::post('/suggestions', [SuggestionController::class, 'store'])->name('suggestions.store');
Route::get('/suggestions', [SuggestionController::class, 'index'])->name('suggestions.index');
Route::get('/suggestions/{suggestion}/edit', [SuggestionController::class, 'edit'])->name('suggestions.edit');
Route::put('/suggestions/{suggestion}', [SuggestionController::class, 'update'])->name('suggestions.update');
Route::delete('/suggestions/{suggestion}', [SuggestionController::class, 'destroy'])->name('suggestions.destroy');

// Routes pour SalesDataController
Route::get('/sales-data', [SalesController::class, 'index'])->name('sales_data.index');
Route::get('/sales/create', [SalesController::class, 'create'])->name('sales_data.create');
Route::post('/sales', [SalesController::class, 'store'])->name('sales_data.store');
Route::get('/sales/{sale}/edit', [SalesController::class, 'edit'])->name('sales_data.edit');
Route::put('/sales/{sale}', [SalesController::class, 'update'])->name('sales_data.update');
Route::delete('/sales/{sale}', [SalesController::class, 'destroy'])->name('sales_data.destroy');


// Routes de reservation
Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');



// Auth routes
Route::middleware(['guest:client'])->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
});
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
