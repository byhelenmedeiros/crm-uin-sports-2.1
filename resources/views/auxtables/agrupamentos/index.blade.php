@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-6">CRUD de Agrupamentos</h1>

  <x-data-table
      :items="$items"
      :parents="$grupos"                     
      routePrefix="aux.grupo-agrupamentos"
      title="Agrupamentos"
      :columns="[
      //    ['field'=>'external_id',           'label'=>'External ID'],
          ['field'=>'name',                  'label'=>'Nome do Agrupamento'],
          ['field'=>'aux_grupo_cliente_id',  'label'=>'Grupo Pai (ID)'],
          ['field'=>'grupo.name',            'label'=>'Nome do Grupo Pai'],
          ['field'=>'active',                'label'=>'Ativo'],
      ]"
  />
@endsection
