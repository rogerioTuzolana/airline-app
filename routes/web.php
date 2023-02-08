<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaiinController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\clients\MemberController;
use App\Http\Controllers\PaymentController;


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
    Route::post('/registo-membro', [MemberController::class, 'regist_member'])->name('register');
    Route::post('/entrar', [MemberController::class, 'login_member'])->name('login');

    Route::get('/comprar-bilhete/{id}', [UserController::class, 'buy_ticket'])->name('comprarbilhete');
    Route::get('/pagar-bilhete', [UserController::class, 'pay_ticket'])->name('pagarbilhete');

    Route::get('/cliente/data-voo', [UserController::class, 'date_airlines'])->name('cliente-data-voo');
    Route::get('/cliente/comprar-bilhete', [UserController::class, 'pay_ticket'])->name('cliente-comprar-bilhete');
    Route::post('/cliente/payment', [PaymentController::class, 'pay'])->name('client_payment');
    Route::get('/cliente/success', [PaymentController::class, 'success'])->name('client_success');
    Route::get('/cliente/error', [PaymentController::class, 'error'])->name('client_error');

    /*Route::post('/esqueci-senha', [UserController::class, 'forgot_password'])->name('esqueci-senha');
    Route::get('/recuperar-senha/{token}', [UserController::class, 'recover_password'])->name('recuperar-senha');
    Route::put('/trocar-senha', [UserController::class, 'change_password'])->name('mudar-senha');*/

});

Route::group(['middleware'=>['auth','PreventBackHistory']], function () {
    Route::post('logout', [AdminController::class, 'logout'])->name('logout');
    Route::post('logout2', [MemberController::class, 'logout'])->name('logout2');

});

Route::group(['prefix' => 'membro','middleware'=>['auth','member','PreventBackHistory']], function () {
    Route::get('/home', [MemberController::class, 'index'])->name('home');
    Route::get('/data-voo', [MemberController::class, 'date_airlines'])->name('data-voo');
    Route::get('/comprar-bilhete', [MemberController::class, 'pay_ticket'])->name('comprar-bilhete');
    Route::get('/minhas-compras', [MemberController::class, 'my_shopping'])->name('minhas-compras');
    Route::get('/perfil', [MemberController::class, 'my_profile'])->name('perfil');
    Route::post('/payment', [PaymentController::class, 'pay'])->name('payment');
    Route::get('/success', [PaymentController::class, 'success'])->name('success');
    Route::get('/error', [PaymentController::class, 'error'])->name('error');
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

