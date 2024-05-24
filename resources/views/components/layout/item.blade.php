<!-- When there is no desire, all things are at peace. - Laozi -->
@props([
    'routeUrl' => '',
    'routeParent' => null,
])
<li class="menu-item {{ ($routeParent ? Route::is($routeParent) : $routeUrl == url()->current()) ? 'active' : '' }}">
    <a href="{{ $routeUrl }}" class="menu-link ps-3 non-item">
        {{ $slot }}
    </a>
</li>
