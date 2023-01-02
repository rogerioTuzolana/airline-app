<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaiinController;
use App\Http\Controllers\MainController;

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






Route::middleware(['guest','PreventBackHistory'])->group(function(){
    
    // route of Maincontroller 

    Route::get('/', [MainController::class, 'index'])->name('/');
    Route::get('/bilhete', [MainController::class, 'Comprar_bilhete'])->name('bilhete');
    Route::get('/tarifa', [MainController::class, 'tarifa'])->name('tarifa');


    // and  route of Maincontroller 

    Route::get('/admin/entrar', [AdminController::class, 'login'])->name('admin_login');

    Route::post('/admin/login', [AdminController::class, 'auth'])->name('auth');

    //Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [AdminController::class, 'create'])->name('create');

    /*Route::post('/esqueci-senha', [UserController::class, 'forgot_password'])->name('esqueci-senha');
    Route::get('/recuperar-senha/{token}', [UserController::class, 'recover_password'])->name('recuperar-senha');
    Route::put('/trocar-senha', [UserController::class, 'change_password'])->name('mudar-senha');*/

});

Route::group(['middleware'=>['auth','PreventBackHistory']], function () {
    Route::post('logout', [AdminController::class, 'logout'])->middleware(['auth'])->name('logout');
});


Route::group(['prefix' => 'admin','middleware'=>['auth','admin','PreventBackHistory']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/frotas', [AdminController::class, 'fleets'])->name('fleets');
    Route::post('/frota', [AdminController::class, 'store_fleet'])->name('frota');
    
    Route::get('/tarifas', [AdminController::class, 'tariffs'])->name('tariffs');
    Route::get('/Regalias', [AdminController::class, 'perks'])->name('perks');

});