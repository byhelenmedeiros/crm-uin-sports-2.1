@extends('layouts.app')

@section('content')
 
<x-data-table
  :items="$items"
  title="Cidades"
  routePrefix="aux.cidades"
  :columns="[
   // ['field'=>'external_id','label'=>'External ID'],
    ['field'=>'name','label'=>'Nome'],
    ['field'=>'active','label'=>'Ativo'],
  ]"
/>

@endsection
