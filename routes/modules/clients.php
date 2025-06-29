<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupSubdivisionController;
use App\Http\Controllers\PrevisaoNegocioController;

Route::middleware(['auth', 'role:admin|superadmin'])->group(function () {

    // Criar cliente
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');

    // Página de pesquisa de clientes (com filtros)
    // Listagem / filtros
    Route::get('/clients', [ClientController::class, 'index'])
         ->name('clients.index');

    // Detalhes de UM cliente
    Route::get('/clients/{client}', [ClientController::class, 'show'])
         ->name('clients.showall');

    // Editar / Atualizar cliente
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');

    // Excluir cliente
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

    // Subdivisões via AJAX
    Route::get('/subdivisoes-por-grupo/{groupId}', [GroupSubdivisionController::class, 'byGroup']);

    // Uploads (temporário?)
    Route::post('/uploads', [ClientController::class, 'store'])->name('uploads.store');
    Route::get('/uploads/{file}', [ClientController::class, 'show'])->name('uploads.show');

    // Previsão de negócios
    // para salvar previsões de um client
Route::post('clients/{client}/previsoes', [PrevisaoNegocioController::class,'store'])
     ->name('clients.previsoes.store');
Route::delete('clients/{client}/previsoes', [PrevisaoNegocioController::class,'destroy'])
     ->name('clients.previsoes.destroy');

});
