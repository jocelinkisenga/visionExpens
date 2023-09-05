<?php

use App\Http\Controllers\DevController;
use App\Http\Controllers\OutputController;
use App\Http\Controllers\PrecommandeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\Manager\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\ReductionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TauxController;
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

Route::get('/', [AuthenticatedSessionController::class, 'create'])->middleware('guest')
->name('login');

// Route::middleware('auth')->group(function(){
//     Route::get('/home',)->name('home');
// });

// Route::get('/', function () {
//     return view('login');
// });

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
    Route::get('/taux',[TauxController::class,'index'])->name('taux');
    Route::get('/reduction',[ReductionController::class,'index'])->name('reductions');
    Route::get('/detail-reduction/{id}',[ReductionController::class,'show'])->name('reduction-detail');
    Route::get('/commandes',[CommandeController::class,'admin_commande'])->name('admin-commande');
    Route::get('/produits',[ProductController::class,'index'])->name('products');
    Route::get('/categories',[CategorieController::class,'index'])->name('categories');
    Route::get('/depenses',[DepenseController::class,'index'])->name('depenses');
    Route::get('/home',[HomeController::class,'index'])->name('home.index');


// Route::middleware(['gerant','auth'])->group(function(){
//     Route::get('/tables',[TableController::class,'index'])->name('tables');
//     // Route::get('/home',[PrecommandeController::class,'index'])->name('commandes');
//     Route::get('/commande/{id}',[CommandeController::class,'new'])->name('new_commande');
//     Route::get('/facture/{id}',[HomeController::class,'facture'])->name('facture');
//
// });



Route::get('/produit-detail/{id}',[ProductController::class,'show'])->name('product-detail');

    Route::get("/rapports",[RapportController::class,'index'])->name('rapports');
    Route::post("/search",[RapportController::class,'search'])->name('search');

    Route::get('/dailyStock',[StockController::class,'daily'])->name("daily-stock");
    Route::get('/weeklyStock',[StockController::class,'weekly'])->name("weekly-stock");
    Route::get('/monthStock',[StockController::class,'monthly'])->name("monthly-stock");

    Route::get('inputs',[InputController::class,'index'])->name('inputs');
    Route::get('outputs',[OutputController::class,'index'])->name('outputs');
    Route::post('seachoutputs', [OutputController::class,'search'])->name('search.output');
    Route::post('seachinputs', [InputController::class,'search'])->name('search.input');

    Route::get('/roles',[RoleController::class,'index'])->name('roles');
    Route::get('/users',[UserController::class,'index'])->name('users');
    Route::get('/users-detail/{id}',[UserController::class,'show'])->name('user-detail');
    Route::post('/updateUser', [UserController::class, 'update'])->name('update.user');


});
Route::get('/devcub', [DevController::class,'index']);
require __DIR__.'/auth.php';
