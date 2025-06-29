@extends('layouts.app')

@section('content')
  <x-data-table
      :items="$items"
      routePrefix="zona-comercial"
      title="Zona Comercial" />
@endsection
