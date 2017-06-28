@extends('examples.layout.inherited.base')

{{-- Yields to the place of @yield --}}
@section('title', 'Laravel Views Example')

{{-- Rewrites the section --}}
@section('header')
    {{-- Returns pre-defined --}}
    @parent

    {{-- Appends --}}
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ URL::route('layout-with-slots') }}">Layout with slots<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
@endsection

{{-- Yields to the place of @yield --}}
@section('content')
    <p>New content.</p>
@endsection