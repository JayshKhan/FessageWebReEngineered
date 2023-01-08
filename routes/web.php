<?php

use App\Http\Controllers\FilesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\Controller::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware('auth')
    ->group(function () {
        Route::resource('files', FilesController::class)->names([
            'index' => 'files.index',
            'create' => 'files.create',
            'store' => 'files.store',
            'show' => 'files.show',
            'edit' => 'files.edit',
            'update' => 'files.update',
            'destroy' => 'files.destroy',
        ]);
        Route::prefix('Userfiles')->group(
            function () {
                Route::get('/download/{id}', [FilesController::class, 'download'])->name('files.download');
                Route::get('/shared', [FilesController::class, 'shared'])->name('files.shared');
                Route::get('/received', [FilesController::class, 'received'])->name('files.received');
            }
        );
        Route::get('/files/send/{id}', [FilesController::class, 'getSharingPage'])->name('files.send');
        Route::post('/files/share', [FilesController::class, 'share'])->name('files.share');
    });
