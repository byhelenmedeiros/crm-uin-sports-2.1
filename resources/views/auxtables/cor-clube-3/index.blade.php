@extends('layouts.app')

@section('content')
  <x-data-table
 
    :items="$items"
    title="Cor 1"
    routePrefix="aux.cor-clube-3"
    :columns="[
          ['field'=>'external_id','label'=>'External ID'],
        ['label' => 'Nome', 'field' => 'name'],
        ['label' => 'Ordem', 'field' => 'order'],
        ['label' => 'Ativo', 'field' => 'active'],
    ]"
/>
@endsection
