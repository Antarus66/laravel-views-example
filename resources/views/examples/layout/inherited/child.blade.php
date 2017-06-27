@extends('examples.layout.inherited.base')

{{-- Yields to the place of @yield --}}
@section('title', 'Laravel Views Example')

{{-- Yields to the place of @yield --}}
@section('content')
    <p>Child content.</p>
@endsection