﻿@extends('layouts.app')

@section('content')
  <x-data-table
      :items="$items"
      routePrefix="aux.escaloes"   
      title="Escalões"
      :columns="[
      //    ['field'=>'external_id','label'=>'External ID'],
        ['label' => 'Nome',      'field' => 'name'],
     
      ]"
  />
@endsection
