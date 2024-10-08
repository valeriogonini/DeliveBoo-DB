<?php

use App\Http\Controllers\Api\ImageDownloadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\OrderController;


use App\Http\Controllers\Api\TypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/{restaurant:id}', [RestaurantController::class, 'show']);

Route::get('/types', [TypeController::class, 'index']);
Route::get('/download/{filename}', [ImageDownloadController::class, 'download'])->name('image.download');

//braintree
Route::get('order/generate', [OrderController::class, 'generate']);
Route::post('order/make/payment', [OrderController::class, 'makePayment']);

Route::get('/test', function () {
    return response()->json([
        'name' => 'Gianni',
        'age' => 33
    ]);
});