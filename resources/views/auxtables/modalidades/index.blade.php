@extends('layouts.app')

@section('content')
  <x-data-table
      :items="$items"
      routePrefix="aux.modalidades"   
      title="Modalidades"
      :columns="[
       //   ['field'=>'external_id','label'=>'External ID'],
        ['label' => 'Nome',      'field' => 'name'],
        ['label' => 'Ordem',     'field' => 'order'],
        ['label' => 'Ativo',     'field' => 'active'],
      ]"
  />
@endsection
