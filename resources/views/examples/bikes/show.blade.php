@extends('examples.bikes.base')

@section('title', 'Bike')

@section('content')
    <div class="row">
        <div class="col-md-12 main">
            <div class="card mb-3">
                <img class="card-img-top img-fluid" src="{{ $photo }}" alt="Bike">
                <div class="card-block">
                    <h4 class="card-title">{{ $model }}</h4>
                    <p class="card-text">{{ $description }}</p>
                    <p class="card-text">
                        <small class="text-muted">
                            @if ($in_stock)
                                Already in stock
                            @else
                                Pre-order
                            @endif
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection