@extends('examples.bikes.base')

@section('title', 'Bikes list')

@section('content')
    <ul class="list-unstyled">
        @each('examples/bikes/list-item', $bikes, 'bike')
    </ul>
@endsection