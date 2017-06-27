@extends('examples.layout.inherited.base')

{{-- Yields to the place of @yield --}}
@section('title', 'Laravel Views Example')

{{-- Rewrites the section --}}
@section('header')
    Overrided header
@endsection

{{-- Rewrites the section --}}
@section('sidebar')
    {{-- Returns pre-defined --}}
    @parent

    <p>This is appended to the base sidebar.</p>
@endsection

{{-- Yields to the place of @yield --}}
@section('content')
    <p>New content.</p>
@endsection