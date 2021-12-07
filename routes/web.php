<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

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
    return view('index');
});
Route::get('/afrekenen', function () {
    return view('afrekenen.index');
});
Route::get('/api',[ShopController::class, 'launchMainShop']);
Route::post('/toevoegen', [ShopController::class, 'addToCart']);
Route::post('/verwijderen', [ShopController::class, 'removeFromCart']);
