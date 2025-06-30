@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-6">Grupos de Clientes e agrupamentos</h1>

  <x-data-table
      :items="$grupos"                
      routePrefix="aux.grupo-clientes"
      title="Grupos de Clientes"
      :columns="[
       // ['field'=>'external_id',       'label'=>'External ID'],
        ['field'=>'name',              'label'=>'Nome do Grupo'],
       // ['field'=>'agrup_external_id', 'label'=>'Agrup. Ext. ID'],
        ['field'=>'agrup_name',        'label'=>'Nome do Agrupamento'],
        ['field'=>'active',            'label'=>'Ativo'],
      ]"
  />
@endsection
