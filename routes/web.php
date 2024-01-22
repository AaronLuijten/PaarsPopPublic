<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccomodationController;
use App\Http\Controllers\NewsController;
use App\Http\Middleware\IsAdmin;

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

// pages only accesible if logged in
Route::middleware(['auth', 'web'])->group(function ()
{
    Route::prefix('/accomodation')->group(function ()
    {
        // show
        Route::get('/', [AccomodationController::class, 'showacco'])->name('showacco');

        Route::get('/create', [AccomodationController::class, 'create'])->name('create');
        Route::post('/create', [AccomodationController::class, 'createPost']);
        // edit
        Route::get('/edit/{Accomodation}', [AccomodationController::class, 'edit'])->name('edit');
        Route::post('/edit/{Accomodation}', [AccomodationController::class, 'update']);

        Route::get('/delete/{Accomodation}', [AccomodationController::class, 'deleteAc'])->name('deleteAc');

        
    }); 
    // Profile
    Route::prefix('/profile')->group(function ()
    {   
        // view
        Route::get('/', [Controller::class, 'profileView'])->name('profileView');

        // edit profile
        Route::get('/edit', [Controller::class, 'editView'])->name('editView');
        Route::post('/edit', [Controller::class, 'profileViewPost'])->name('editViewPost');

        // delete profile
        Route::get('/delete/confirm', [Controller::class, 'deleteView'])->name('deleteProfile');
        Route::get('/delete', [Controller::class, 'deleteConfirmed'])->name('deleteConfirmed');

        // change password
        Route::get('/changePassword', [Controller::class, 'changePassword'])->name('changePassword');
        Route::post('/changePassword', [Controller::class, 'TrychangePassword']);
    });
});
// home
Route::get('/',[Controller::class, 'index'])->name('index');
Route::get('/plattegrond', [Controller::class, 'map'])->name('showMap');

// login
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/login', [AuthController::class, 'loginpost']);
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

// signup
Route::get('/auth/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/auth/signup', [AuthController::class, 'signuppost']);

Route::get('/auth/reset-password', [AuthController::class, 'resetPWView'])->name('resetPWView');
Route::post('/auth/reset-password', [AuthController::class, 'sendEmail']);

// Admin
Route::middleware(['auth','admin'])->group(function ()
{
    Route::prefix('/admin')->group(function ()
    {
        Route::get('/', [AdminController::class, 'index'])->name('adminIndex');
        Route::get('/users', [AdminController::class, 'userShow'])->name('userShow');
        Route::get('/user/{User}', [AdminController::class, 'userDetailed'])->name('userDetailed');
        Route::get('/reserveringen', [AdminController::class, 'accomodationShow'])->name('accomodationShow');

        Route::prefix('/news')->group(function ()
        {   
            // view all posts
            Route::get('/', [NewsController::class, 'index'])->name('newsIndex');

            // create
            Route::get('/create', [NewsController::class, 'newsCreate'])->name('newsCreate');
            Route::post('/create', [NewsController::class, 'newsStore']);

            // delete
            Route::get('/delete{new}/confirm', [NewsController::class, 'deleteShow'])->name('deleteNews');
            Route::get('/delete{new}/confirm/yes', [NewsController::class, 'deleteNews'])->name('deleteConfirm');

            // Update
            Route::get('/update/{new}', [NewsController::class, 'updateShow'])->name('updateShow');
            Route::post('/update/{new}', [NewsController::class, 'newsUpdate']);

            // view specific post
            Route::get('/{news}', [NewsController::class, 'showNews'])->name('showNews');
        });

    });

    // Should be moved to the right prefix / location when app launches.
    // ------------------------------------------------------------------------------------
    Route::get('/lineup',[Controller::class, 'lineup'])->name('lineup');

    // home-news
    Route::prefix('/news')->group(function ()
    {
        Route::get('/', [NewsController::class, 'showCard'])->name('showCard');
        Route::get('/{news}', [NewsController::class, 'showArticle'])->name('showArticle');
    });
    // ------------------------------------------------------------------------------------
});


