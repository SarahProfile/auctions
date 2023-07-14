<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\BiddingController;
use App\Http\Controllers\AdsController;
use Illuminate\Support\Facades\App;
use App\Models\Attempt;
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






Route::post('upload',function(Request $request){
     $filename = time().'.'.$request->file->getClientOriginalExtension();
  $request->file->move(public_path('/uploads'), $filename);
  
  return ['name'=>$filename];
});

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
Route::resource('types', 'TypesController');

Route::group([
   // 'middleware' => 'api',
    'prefix' => 'category'
], function ($router) {
   
    Route::post('/', [CategoryController::class, 'store']);
    Route::get('/{id}', [CategoryController::class, 'list']);    
    Route::get('/details/{id}', [CategoryController::class, 'show']);    
});
//Route::resource('category', 'CategoryController');
//Route::resource('message', 'MessageController');
Route::resource('country', 'CountryController');
Route::resource('attribute', 'AttributeController');
//Route::resource('ads', 'AdsController');
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

Route::group([
   // 'middleware' => 'api',
    'prefix' => 'message'
], function ($router) {
   Route::get('/list',[MessageController::class, 'list']);
   Route::get('/{id}',[MessageController::class, 'show']);
    
    Route::post('/',[MessageController::class, 'store']);
    
  
    
});


Route::resource('user', 'UserController');
Route::resource('role', 'RoleController');

//Route::resource('service', 'ServiceController');
Route::resource('attempt', 'AttemptController');
Route::resource('offer', 'OfferController');
Route::resource('bid', 'BidController');
Route::resource('design', 'DesignController');
Route::resource('requirment', 'RequirmentController');