@extends('bikes.base')

@section('title', 'Bikes list')

@section('content')
    <ul class="list-unstyled">
        @each('bikes/list-item', $bikes, 'bike')
    </ul>
@endsection