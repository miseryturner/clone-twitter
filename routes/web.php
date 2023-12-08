<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// ideas
Route::group(['prefix' => 'idea/', 'as' => 'idea.'], function () {
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');
    Route::post('', [IdeaController::class, 'store'])->name('create');

    Route::group(['middleware' => ['auth']], function() {
        Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');  
        Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');  
        Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit'); 

        Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.create');

        Route::post('/{idea}/like', [IdeaLikeController::class, 'like'])->name('like');
        Route::post('/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->name('unlike');
    });
});

//users
Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');
Route::resource('users', UserController::class)->only('show');
Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::get('feed', FeedController::class)->middleware('auth')->name('feed');

Route::get('admin', [AdminDashboardController::class, 'show'])->name('admin.dashboard')->middleware(['auth', 'admin']);