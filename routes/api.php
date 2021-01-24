<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|if($check->is_verified =='1'){
            if($check->is_active =='1'){
                if($check->is_login =='0'){
                    if(Auth::attempt($user)){
                        $this->isLogin(Auth::id());
                        $response = $http->post('http://localhost:8000/oauth/token');
                    }
                }
            }
        }
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Protected routes (lek mau login mesti pakai bearer token)
// Route::get('events', [ApiController::class,'getAllEvents'])->middleware('auth:api');
// Route::get('events/{id}', [ApiController::class,'getEvent'])->middleware('auth:api');
// Route::post('events', [ApiController::class,'createEvent'])->middleware('auth:api');
// Route::put('events/{id}', [ApiController::class,'updateEvent'])->middleware('auth:api');
// Route::delete('events/{id}',[ApiController::class,'deleteEvent'])->middleware('auth:api');

Route::post('users/api-register', [RegisterController::class,'register']);
Route::post('users/api-login', [LoginController::class,'login']);
Route::get('events', [ApiController::class,'getAllEvents']);
Route::get('events/{id}', [ApiController::class,'getEvent']);
Route::post('events', [ApiController::class,'createEvent']);
Route::put('events/{id}', [ApiController::class,'updateEvent']);
Route::delete('events/{id}',[ApiController::class,'deleteEvent']);
Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);
