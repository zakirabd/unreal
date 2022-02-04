<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('v1')->group(function () {
    Route::resource('/register', UserController::class);
    Route::post('/login', [LoginController::class, 'login']);
    Route::group(['middleware'=> ['auth:sanctum']], function(){
        Route::get('/user', [LoginController::class, 'getUser']);
        Route::post('/logOut', [loginController::class, 'logOut']);
    });
});
