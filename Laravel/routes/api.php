<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\AuctionController;

use App\Http\Controllers\BiddingController;

use Illuminate\Support\Facades\App;

use App\Models\User;



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








Route::group([
   // 'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/profile', [AuthController::class, 'userProfile']);    
});


Route::group([
    'prefix' => 'bidding'
], function ($router) {
   
    Route::post('/', [BiddingController::class, 'store']);
    Route::get('/{id}', [BiddingController::class, 'list']);    
});
Route::group([
   // 'middleware' => 'api',
    'prefix' => 'auction'
], function ($router) {
   
   Route::get('/me',[AuctionController::class, 'myList']);
   Route::get('/like/{id}',[AuctionController::class, 'like']);
    Route::post('/create', [AuctionController::class, 'store']);
    Route::post('/list',[AuctionController::class, 'list']);
   Route::get('/{id}', [AuctionController::class, 'show']);  
   Route::get('/',[AuctionController::class, 'index']);
    Route::post('/{id}', [AuctionController::class, 'edit']);  
    Route::delete('/{id}',[AuctionController::class, 'delete']);
    
});


Route::group([
   // 'middleware' => 'api',
    'prefix' => 'user'
], function ($router) {
   
   Route::get('/{id}',[UserController::class, 'show']);
  
    
});



