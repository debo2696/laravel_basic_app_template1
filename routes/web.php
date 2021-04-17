<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;


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

Route::get('/', [BaseController::class, 'getlogin'])->name('login');
Route::get('login', [BaseController::class, 'getlogin'])->name('login');
Route::get('signup', [BaseController::class, 'getsignup'])->name('signup');
Route::post('plogin', [BaseController::class, 'postlogin'])->name('plogin');
Route::post('psignup', [BaseController::class, 'postsignup'])->name('psignup');
Route::get('out', [BaseController::class, 'logout'])->name('out');
Route::get('read', [BaseController::class, 'fileread'])->name('read');
Route::get('flash', [BaseController::class, 'getFlash'])->name('inp');
Route::post('pflash', [BaseController::class, 'postFlash'])->name('pinp');
Route::get('ses', [BaseController::class, 'sesCheck']);


Route::group(['middleware'=>['KernelCredData']], function()
{
    Route::get('list', [BaseController::class, 'list'])->name('list'); //Dashboard page route
    Route::get('/list/fetch', [BaseController::class, 'fetch'])->name('navstate');
    Route::get('tpage1', [BaseController::class, 'getCookie'])->name('vcookie');
});