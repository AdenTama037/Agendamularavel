<?php

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
//<li>
//<a href={{ url('event/approval') }}>Events Approval</a>
//</li>
//</ul>

// Route::get('/', function () {
//     return view('welcome');
// });
//<a class="btn btn-small btn-info" href="{{ URL::to('event/' . $value->id . '/edit') }}">Edit</a>

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'status'])->name('home');
Route::get('/event', [App\Http\Controllers\EventController::class, 'index']);
Route::get('/event/approval', [App\Http\Controllers\EventController::class, 'approval'])->name('event.approval');
Route::get('/user', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
Route::get('/event/create', [App\Http\Controllers\EventController::class, 'create']);
Route::post('/event/create/submit', [App\Http\Controllers\EventController::class, 'store'])->name('event.store');
Route::delete('/event/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('event.destroy');
//Route::put('events/{id}', [App\Http\Controllers\EventController::class,'update'])->name('event.update');
Route::get('event/edit/{id}', [App\Http\Controllers\EventController::class,'edit'])->name('event.edit');
Route::post('event/update/submit', [App\Http\Controllers\EventController::class,'update'])->name('event.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
