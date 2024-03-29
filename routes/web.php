<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;

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

Route::group(['middleware' => []], function () {

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('blog', [PostController::class, 'index'])->name('post.index');
    Route::get('blog/{post:slug}', [PostController::class, 'show'])->name('post.show');

    Route::get('projects', [ProjectController::class, 'index'])->name('project.index');
    Route::get('projects/{project:slug}', [ProjectController::class, 'show'])->name('project.show');

});