<?php

namespace App\Providers;

use App\Models\Aux\AuxCidade;
use App\Models\Aux\AuxCorClube1;
use App\Models\Aux\AuxCorClube2;
use App\Models\Aux\AuxCorClube3;
use App\Models\Aux\AuxDistrito;
use App\Models\Aux\AuxEscalao;
use App\Models\Aux\AuxModalidade;
use App\Models\Aux\AuxPadrao;
use App\Models\Aux\AuxPais;
use App\Models\Aux\AuxPagamento;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Aux\AuxModalidadePagamento;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('escaloes', AuxEscalao::select('id', 'name')->orderBy('name')->get());
        View::share('auxModalidades', AuxModalidade::select('id', 'name')->orderBy('name')->get());
        //cores1
        View::share('auxPadroes', AuxPadrao::select('id', 'name')->orderBy('name')->get());
         View::share('auxCorClube1s', AuxCorClube1::select('id','name')->orderBy('name')->get());
        View::share('auxCorClube2s', AuxCorClube2::select('id','name')->orderBy('name')->get());
        View::share('auxCorClube3s', AuxCorClube3::select('id','name')->orderBy('name')->get());
        View::share('auxPais', AuxPais::select('id', 'name')->orderBy('name')->get());
        View::share('auxDistritos', AuxDistrito::select('id', 'name')->orderBy('name')->get());
        View::share('auxCidades', AuxCidade::select('id', 'name')->orderBy('name')->get());
        View::share('auxPagamento', AuxPagamento::select('id', 'name')->orderBy('name')->get());
        View::share('auxModalidadePagamento', AuxModalidadePagamento::select('id', 'name')->orderBy('name')->get()); 

        


    }
}
