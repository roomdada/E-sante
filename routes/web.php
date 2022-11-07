<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConsultationsController;
use App\Http\Controllers\MedicalBookletsController;
use App\Http\Controllers\MedicalExaminationsController;
use App\Http\Controllers\PrescriptionsController;

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

Route::redirect('/', 'login');

Route::middleware('auth')->prefix('dashboard')->group(function(){
  Route::get('', DashboardController::class)->name('dashboard');
  Route::resource('utilisateurs', UsersController::class);
  Route::resource('carnets', MedicalBookletsController::class);
  Route::resource('consultations', ConsultationsController::class);
  Route::resource('examen-medical', MedicalExaminationsController::class);
  Route::resource('ordonnances', PrescriptionsController::class);
});



require __DIR__.'/auth.php';
