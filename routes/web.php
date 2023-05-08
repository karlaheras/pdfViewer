<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
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
Route::get("/login", [SiteController::class, "login"])->name("login");
Route::get('usuario/registrar', [UserController::class, "create"])->name("user.create");
Route::post('usuario/registrar', [UserController::class, "store"])->name("user.store");
Route::post("/login", [SiteController::class, "authenticate"]);
Route::post("/logout", [SiteController::class, "logout"]);

Route::middleware(["auth"])->group(function (){
    Route::get('/', [HomeController::class,"index"])->name('home');
    
    Route::post('home/create/', [HomeController::class,"store"])->name("home.store");
    Route::get('home/create/', [HomeController::class,"create"])->name("home.create");
    Route::get('home/edit/{home}', [HomeController::class,"edit"])->name("home.edit");
    Route::post('home/edit/{home}', [HomeController::class,"update"])->name("home.update");
    Route::post('home/delete/{home}', [HomeController::class,"destroy"])->name("home.destroy");
});


Route::prefix("/usuario")->middleware(["auth"])->group(function (){
    
    Route::get('/', [UserController::class, "index"]);
   
    
    Route::get('/actualizar/{user}', [UserController::class, "edit"]);
    Route::post('/actualizar/{user}', [UserController::class, "update"]);
    Route::get('/{user}', [UserController::class, "show"]);
    Route::post('/delete/{user}', [UserController::class, "delete"]);   

});