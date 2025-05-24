<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Request Methods
// Route::get(); // GET and HEAD
// Route::post(); // POST
// Route::put(); // PUT
// Route::patch(); // PATCH
// Route::delete(); // DELETE
// Route::options(); // OPTIONS

// Other Helper Methods 
// Route::any();
// Route::match();
// Route::view();
// Route::redirect();
// Route::resource();
// Route::apiResource();
// Route::group();

Route::get('products', [ProductsController::class, 'index']);
// Route::get('products/Watches', [ProductsController::class, 'index']);
// Route::get('products/T-shirts', [ProductsController::class, 'index']);
// Route::get('products/Cameras', [ProductsController::class, 'index']);
// Route::get('products/Mobiles', [ProductsController::class, 'index']);
Route::get('products/{name?}', [ProductsController::class, 'show']); // Optional parameter (name)
Route::get('products/{name}/{category}', [ProductsController::class, 'show']); // The order of parameters is important in the route registration, and it must match the order of the arguments passed to the action in the controller
Route::get('products/{name}/{category?}', [ProductsController::class, 'show']); // Optional parameter (category)

// Route::get('products/{category}/{name}', [ProductsController::class, 'show']);


Route::get('/welcome1.php', [WelcomeController::class, 'welcome']); // Laravel 8

Route::get('/welcome.php', ['App\Http\Controllers\WelcomeController', 'welcome']); // GET and HEAD

Route::get('/welcome/to/laravel', 'App\Http\Controllers\WelcomeController@welcome'); // GET and HEAD

// Route::post('/welcome', 'WelcomeController@welcome');
Route::post('/welcome', 'App\Http\Controllers\WelcomeController@welcome');

Route::any('/any', 'App\Http\Controllers\WelcomeController@welcome');
Route::match(['get', 'put', 'post'], '/match', 'App\Http\Controllers\WelcomeController@welcome');
Route::view('/laravel', 'welcome');
Route::redirect('/home', '/');