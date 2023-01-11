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
    Route::post('/frota', [AdminController::class, 'store_fleet'])->name('fleet');
    
    Route::get('/tarifas', [AdminController::class, 'tariffs'])->name('tariffs');
    Route::post('/tarifa', [AdminController::class, 'store_tariff'])->name('tariff');
    Route::get('/regalias', [AdminController::class, 'perks'])->name('perks');
    Route::post('/regalia', [AdminController::class, 'store_perk'])->name('perk');
    Route::delete('/eliminar-regalia', [AdminController::class, 'perk_delete'])->name('perk_delete');
    Route::post('/regalia-tarifa', [AdminController::class, 'store_perk_tariff'])->name('perk_tariff');
    Route::post('/ativar-regalia', [AdminController::class, 'change_status_perk'])->name('change_status_perk');
    
    Route::post('/ativar-tarifa-voo', [AdminController::class, 'change_status_tariff_airline'])->name('change_status_tariff_airline'); 
    Route::get('/voos', [AdminController::class, 'airlines'])->name('airlines');
    Route::post('/voo', [AdminController::class, 'store_airline'])->name('airline');
});

