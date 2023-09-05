<?php
use Illuminate\Support\Facades\Route;


Route::middleware(['gerant','auth'])->group(function(){
    Route::get('/tables',[TableController::class,'index'])->name('tables');
    Route::get('/home',[PrecommandeController::class,'index'])->name('commandes');
    Route::get('/commande/{id}',[CommandeController::class,'new'])->name('new_commande');
    Route::get('/facture/{id}',[HomeController::class,'facture'])->name('facture');
    Route::get('/produit-detail/{id}',[ProductController::class,'show'])->name('product-detail');
});
