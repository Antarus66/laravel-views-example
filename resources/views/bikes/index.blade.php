@extends('bikes.base')

@section('title', 'Bikes list')

@section('content')
    @if (count($bikes) === 0)
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">All the bikes are sold</h4>
            <p>
                While I was travelling the world wide web the other day I did come across quite a few good looking bicycles. Now a lot of the bikes I looked at were not for sale, a lot of them were one offs, as in they just made one of them, and a lot of them were so rare that you cannot find anywhere. Also some were museum pieces.
            </p>
        </div>
    @else
        <ul class="list-unstyled">
            @each('bikes/list-item', $bikes, 'bike')
        </ul>
    @endif
@endsection