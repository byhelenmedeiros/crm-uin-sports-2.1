﻿@extends('layouts.app')

@section('content')
  <x-data-table
      :items="$items"
      routePrefix="aux.transportes"   
      title="Transportes"
      :columns="[
          ['field'=>'external_id','label'=>'External ID'],
        ['label' => 'Nome',      'field' => 'name'],
        ['label' => 'Ordem',     'field' => 'order'],
        ['label' => 'Ativo',     'field' => 'active'],
      ]"
  />
@endsection
