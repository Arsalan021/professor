<?php

use Illuminate\Support\Facades\Route;
// Front Web Site
use App\Http\Controllers\FrontController;


// For Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\BlogSectionController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\HumanSectionController;
use App\Http\Controllers\Admin\ProfessorSectionController;
use App\Http\Controllers\Admin\WritterSectionController;

// For User
use App\Http\Controllers\User\UserController as UController;

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
Route::get('/',[FrontController::class,'index'])->name('web.home');
Route::get('/write',[FrontController::class,'write'])->name('web.write');
Route::get('/professor',[FrontController::class,'professor'])->name('web.professor');
Route::get('/human',[FrontController::class,'human'])->name('web.human');



Auth::routes();


// Dashboard Routes
Route::controller(\App\Http\Controllers\Admin\AdminController::class)->group(function () {

   route::get('/admin','user_login')->name('user-login')->middleware('guest');
   route::post('loginAdminProcess','loginAdminProcess')->name('loginAdminProcess');

   route::get('admin/user-register','userRegister')->name('user-register');
   route::post('user-register-process','RegisterProcess')->name('user-register-process');

   Route::get('forgot-password', 'forgotPasswords')->name('forgot-password');
   Route::post('forgotPassword', 'forgotPassword')->name('forgotPassword');
   Route::post('updatePassword', 'updatePassword')->name('updatePassword');
   route::get('resetpassword/{id}','resetpassword')->name('resetpassword');

});

Route::middleware(['auth','can:isAdmin'])->prefix('admin')->group(function()
{



    Route::resource('users', UserController::class);
    Route::resource('home_section', HomeSectionController::class);
    Route::resource('about ', AboutSectionController::class);
    Route::resource('blog ', BlogSectionController::class);
    Route::resource('human ', HumanSectionController::class);
    Route::resource('professor ', ProfessorSectionController::class);
    Route::resource('writter ', WritterSectionController::class);

   Route::controller(AdminController::class)->group(function ()
    {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
        Route::get('change-status', 'change_status')->name('change-status');
    });
});

Route::middleware(['auth','can:isUser'])->prefix('user')->group(function(){

    Route::controller(UController::class)->group(function () {


  });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
