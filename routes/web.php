<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

//ada route, yang metode requestnya get (URL)yang alamatnya adalah '/', dia akan menjalankan rute ini.
Route::get('/', function () {
    return view('welcome'); //tampilkan sebuah view yang namanya welcome di dalam forder view
});

Route::get('/about', function () {
    return view('about', [
        "name" => "Dwi Krisna",
        "email" => "sss@gmail.com",
        "image" => ""
    ]);
});

Route::get('/home', function () {
    return view('home');
});
// Route::get('/products/create', function () {
//     return view('Products/create');
// });
// Route::get('/products/update', function () {
//     return view('Products/update');
// });
// Route::get('/products', function () {
//     return view('Products/index');
// });

Route::resource('products', ProductController::class); //nyambungno ke contropller
// dasar link products
