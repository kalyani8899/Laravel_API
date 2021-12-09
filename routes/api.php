<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('fetch-blogs','Api\BlogController@getTable');
// Route::post('insert-blog','Api\BlogController@storeBlog');

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get('fetch-blogs', [BlogController::class, 'getTable']);
    Route::post('insert-blog',[BlogController::class, 'storeBlog']);
    // Route::post('update-blog/{id}',[BlogController::class, 'updateBlog']);
    Route::post('update-blog',[BlogController::class, 'updateBlog']);
    Route::post('delete-blog',[BlogController::class, 'deleteBlog']);
    });


// Route::get('fetch-blogs', [BlogController::class, 'getTable']);
// Route::post('insert-blog',[BlogController::class, 'storeBlog']);
// // Route::post('update-blog/{id}',[BlogController::class, 'updateBlog']);
// Route::post('update-blog',[BlogController::class, 'updateBlog']);
// Route::post('delete-blog',[BlogController::class, 'deleteBlog']);

Route::post('register',[AuthController::class, 'register']);
Route::post('login',[UserController::class, 'index']);
// Route::post('login',[AuthController::class, 'login']);
Route::post('logout',[AuthController::class, 'logout']);