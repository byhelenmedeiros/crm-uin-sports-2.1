<?php

use App\Http\Controllers\CrmModalidadeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Application;
use App\Http\Controllers\auxtable\AuxDataController;
use App\Http\Controllers\PostalZoneMappingController;

Route::get('/', function () {
    return view('dashboard.welcome', [
        'canLogin'       => Route::has('login'),
        'canRegister'    => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('crm.dashboard');


Route::middleware(['auth', 'verified'])
    ->prefix('crm')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard.index', [
                'auth' => [
                    'user'         => auth()->user(),
                    'isAdmin'      => auth()->user()->isAdmin ?? false,
                    'isSuperadmin' => auth()->user()->isSuperadmin ?? false,
                ],
            ]);
        })->name('dashboard');
    });

Route::resource('clients.modalidades', CrmModalidadeController::class)
    ->shallow()
    ->parameters(['clients' => 'client', 'modalidades' => 'modalidade']);



Route::middleware('auth')->group(function () {
    // MOSTRAR perfil
    Route::get('/profile',      [ProfileController::class, 'show'])->name('profile.show');

    // EDITAR perfil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // ATUALIZAR perfil
    Route::patch('/profile',    [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile',      [ProfileController::class, 'update'])->name('profile.update');
    // DELETAR perfil
    Route::delete('/profile',   [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/auxdata', [AuxDataController::class, 'types'])->name('auxtables.types.index');

Route::get('postal-zone', [PostalZoneMappingController::class, 'show']);


// Modularização das rotas
require __DIR__ . '/auth.php';
require __DIR__ . '/modules/users.php';
require __DIR__ . '/modules/clients.php';
require __DIR__ . '/modules/aux-data.php';
