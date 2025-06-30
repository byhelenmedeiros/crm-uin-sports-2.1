@extends('layouts.app')

@section('content')
  <x-data-table
 
    :items="$items"
    title="Preços"
    routePrefix="aux.preco"
    :columns="[
        ['label' => 'Nome', 'field' => 'name'],
    ]"
/>
@endsection
