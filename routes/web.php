<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\RegistroController;

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

Route::get('/', function () {   return view('welcome');});

//Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('department',[App\Http\Controllers\DepartmentController::class,'index']);
Route::get('/departamento_filter/{filter}',[ProvinceController::class,'index'])->name('index.{filter}');
Route::get('/provincia_filter/{filter}',[DistrictController::class,'index'])->name('index.{filter}');
Route::get('tipo_documento',[App\Http\Controllers\TypedocumentController::class,'index']);

//Route::resource('personas',App\Http\Controllers\RegistroController::class)->names('registro');
Route::resource('registro', RegistroController::class);
/*Route::get('/departamento_filter/{filter}', function($filter){
   return "prueba filter:{{$filter}}";
});*/

/*Route::post('ajax/request/store', [ProvinceController::class, 'ajaxRequestStore'])->name('ajax.request.store');

Route::get('ajax/request', [StudentController::class, 'ajaxRequest'])->name('ajax.request');*/