@extends('examples.layout.with-slots.base')

{{-- Yields to the place of @yield --}}
@section('title', 'Laravel Views Example')

{{-- Rewrites the section --}}
@section('content')
    <p>New content.</p>
@endsection