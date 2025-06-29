<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auxtable\{
    AuxDistritoController,
    AuxDataController,
    AuxEscalaoController,
    AuxCidadeController,
    AuxPaisController,
    AuxModalidadeController,
    AuxTransporteController,
    AuxPagamentoController,
    AuxZonaComercialController,
    AuxZonaController,
    AuxVendedorController,
    AuxGrupoClienteController,
    AuxAgrupamentoController,
    AuxCorClube1Controller,
    AuxCorClube2Controller,
    AuxCorClube3Controller,
    AuxPadraoController,
    AuxModalidadePagamentoController
};

$auxResources = [
    'escaloes'        => AuxEscalaoController::class,
    'cidades'         => AuxCidadeController::class,
    'pais'            => AuxPaisController::class,
    'distritos'       => AuxDistritoController::class,
    'modalidades'     => AuxModalidadeController::class,
    'transportes'     => AuxTransporteController::class,
    'pagamentos'      => AuxPagamentoController::class,
    'zona-comercials' => AuxZonaComercialController::class,
    'zonas'           => AuxZonaController::class,
    'vendedores'      => AuxVendedorController::class,
    'grupo-clientes'  => AuxGrupoClienteController::class,
    'agrupamentos'    => AuxAgrupamentoController::class,
    'cor-clube-1'     => AuxCorClube1Controller::class,
    'cor-clube-2'     => AuxCorClube2Controller::class,
    'cor-clube-3'     => AuxCorClube3Controller::class,
    'padroes'         => AuxPadraoController::class,
    'agrupamento'    => AuxAgrupamentoController::class,
    'modalidadepagamento' => AuxModalidadePagamentoController::class,
];

Route::get('aux-grupo-clientes/{group}/subdivisions', [AuxGrupoClienteController::class, 'subdivisions']);

// Grupo para superadmins
Route::middleware(['auth','role:superadmin'])
     ->prefix('aux')
     ->name('aux.')
     ->group(function() use($auxResources) {
        
        // Tipos gerais
        Route::get('types', [AuxDataController::class,'types'])->name('types.index');

        // Cada resource como /aux/{uri}
        foreach($auxResources as $uri => $controller) {
            Route::resource($uri, $controller);
            // rota de exclusão em massa
            Route::post("$uri/mass-destroy", [$controller,'massDestroy'])
                 ->name("$uri.massDestroy");
        }
     });

// Acesso mais amplo
Route::middleware('auth')->group(function(){
    Route::get('/tipos-auxiliares', [AuxDataController::class,'index'])
         ->name('auxtables.types.index');
});
