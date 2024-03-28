<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//Normalmente se declaran de esta forma las rutas pero para una api se declaran diferente 
// Route::get('/categorias', [CategoriaController::class,'index']);
//Las rutas para una api se declaran de la siguiente forma y laravel detecta automaticamente que tipo de peticion es la que se esta haciendo
Route::apiResource('/categorias', CategoriaController::class);
Route::apiResource('/productos', ProductoController::class);

//Autenticacion 
Route::post('/registro',[AuthController::class,'register']) ;

