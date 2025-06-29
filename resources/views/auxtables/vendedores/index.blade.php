@extends('layouts.app')

@section('content')
  <x-data-table
      :items="$items"
      routePrefix="vendedores"
      title="Vendedores" />
@endsection
