@extends('layouts.app')

@section('content')
  <x-data-table
      :items="$items"
      routePrefix="zonas"
      title="Zonas" />
@endsection
