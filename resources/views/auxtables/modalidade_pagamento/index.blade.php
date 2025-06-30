@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-6">Modalidades de Pagamento</h1>

 
  <x-data-table
      :items="$items"
      routePrefix="aux.modalidadepagamento"
      title="Modalidades de Pagamento"
      :columns="[
    //    ['field'=>'external_id',       'label'=>'External ID'],
        ['field'=>'name',              'label'=>'Nome da Modalidade de Pagamento'],
        ['field'=>'active',            'label'=>'Ativo'],
      ]"
  />
@endsection
