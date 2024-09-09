<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\QuestionController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckSession;
use Illuminate\Support\Facades\Route;


Route::get('/', [QuestionController::class, 'index'])->middleware(CheckSession::class)->name('index');
Route::get('/login', [QuestionController::class, 'login'])->name('login');
Route::post('/login', [QuestionController::class, 'loginPost'])->name('loginPost');
Route::post('/', [QuestionController::class, 'submitForm'])->name('submitForm');
Route::get('/getAnketValue', [AdminController::class, 'getAnketValue'])->name('admin.getAnketValue');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware(CheckAdmin::class);
Route::get('/selection', [QuestionController::class, 'selection'])->middleware(CheckSession::class)->name('selection');

Route::get('/rp/{detail}', [QuestionController::class, 'rpDetail'])->middleware(CheckSession::class)->name('rpDetail');
Route::get('/rp', [QuestionController::class, 'rp'])->middleware(CheckSession::class)->name('rp');