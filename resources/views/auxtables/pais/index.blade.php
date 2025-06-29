@extends('layouts.app')

@section('content')
<x-data-table
  :items="$items"
  title="Países"
  routePrefix="aux.pais"    
  :columns="[
      ['label' => 'Nome',    'field' => 'name'],
      ['label' => 'Ordem',   'field' => 'order'],
      ['label' => 'Ativo',   'field' => 'active'],
  ]"
/>
@endsection
