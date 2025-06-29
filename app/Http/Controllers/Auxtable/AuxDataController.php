<?php

namespace App\Http\Controllers\Aux;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuxDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function types(): View
    {
        if (!auth()->user()->hasRole('superadmin')) {
            Log::warning('Acesso negado em AuxDataController@types', [
                'user_id' => auth()->id(),
            ]);
            abort(403, 'Acesso negado.');
        }

        return view('auxtables.types.index');
    }
public function index(): View
{
    return $this->types();
}

    // Redireciona index para types, mantendo compatibilidade com rotas antigas
}   