<li class="media my-4">
    <img class="d-flex mr-3 img-fluid" width="150" src="{{ $bike['photo'] }}" alt="Generic placeholder image">
    <div class="media-body">
        <h5 class="mt-0 mb-1">
            <a href="{{ route('bike-show', ['id' => $bike['id']]) }}">{{ $bike['model'] }}</a>
        </h5>
        {{ $bike['description'] }}
    </div>
</li>