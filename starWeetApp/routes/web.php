<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\AuthController;
use App\Mail\emailAuth;

/** PAGES */
Route::get('/', [AuthController::class, 'verifyauth'])->name('login');
Route::get('/home', [AuthController::class, 'homePage'])->name('homePage')->middleware('auth');;


/**MODALs */
Route::get('/modal-content', [ModalController::class, 'loadContent'])->name('modal.content');


/** ACTIONS*/
Route::get('/confirm-code', [AuthController::class, 'ConfirmCode'])->name('ConfirmCode');
Route::get('/createcodemail', [AuthController::class, 'CreateCod'])->name('verifyCodMai');
Route::get('/createUser', [AuthController::class, 'CreateUser'])->name('CreateUser');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/login-action', [AuthController::class, 'login'])->name('login.action');


