<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ModalController;

/** PAGES */
Route::get('/', [PageController::class, 'index'])->name('welcome');


/**MODALs */
Route::get('/modal-content', [ModalController::class, 'loadContent'])->name('modal.content');
