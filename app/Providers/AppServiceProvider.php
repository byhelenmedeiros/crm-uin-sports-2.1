<?php

namespace App\Providers;

use App\Models\Auxtable\AuxCidade;
use App\Models\Auxtable\AuxCorClube1;
use App\Models\Auxtable\AuxCorClube2;
use App\Models\Auxtable\AuxCorClube3;
use App\Models\Auxtable\AuxDistrito;
use App\Models\Auxtable\AuxEscalao;
use App\Models\Auxtable\AuxModalidade;
use App\Models\Auxtable\AuxPadrao;
use App\Models\Auxtable\AuxPais;
use App\Models\Auxtable\AuxPagamento;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Auxtable\AuxModalidadePagamento;
use App\Models\Auxtable\AuxTransporte;
use App\Models\CrmAddressType;
use App\Models\Auxtable\AuxGrupoCliente;

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
        View::share('auxTransportes', AuxTransporte::select('id', 'external_id', 'name')->orderBy('name')->get());
                View::share('addressTypes', CrmAddressType::all(['id','name']));
        //aux grupo_clientes
      View::share(
      'auxGrupoClientes',         
      AuxGrupoCliente::with('children')
        ->whereNull('parent_id')
        ->orderBy('external_id')
        ->get(['id','name','external_id','parent_id'])
    );
                


        


    }
}
