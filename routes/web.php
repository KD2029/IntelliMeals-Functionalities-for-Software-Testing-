<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('crud.create',[api_controller::class,'index'])->name('crud.create');
Route::get('edit/{id}',[crudcontroller::class,'edit'])->name('edit');//users
Route::put('update/{id1}',[crudcontroller::class,'update'])->name('update');//foods
Route::get('edit/{id1}',[crudcontroller::class,'edit'])->name('edit1');//foods
Route::get('edit/{id2}',[crudcontroller::class,'edit'])->name('edit2');//nutrients
Route::get('edit/{id3?}',[crudcontroller::class,'edit'])->name('edit3');//Category
Route::get('edit/{id4}',[crudcontroller::class,'edit'])->name('edit4');//FoodPart
Route::post('api_call',[api_controller::class,'api_call'])->name('api_call');
Route::post('/store',[crudcontroller::class,'store'])->name('store');
Route::resource('crud',crudcontroller::class);
Route::get('/admindashboard',[crudcontroller::class,'index'])->name('show');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/add', function () {
    return view('add');
});
