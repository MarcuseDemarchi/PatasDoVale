@props(['routePage' => null, 'id' => null, 'class' => null])

@if($routePage)
    <a href="{{ Route::has($routePage) ? route($routePage) : '#' }}" id="{{ $id }}">
        <button class="{{ $class }}">
            {{ $slot }}
        </button>
    </a>
@else
    <button id="{{ $id }}" class="{{ $class }}">
        {{ $slot }}
    </button>
@endif