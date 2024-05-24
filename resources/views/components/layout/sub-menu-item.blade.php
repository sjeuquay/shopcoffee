<!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
@props([
    'routeUrl' => '',
])
<li class="menu-item {{ $routeUrl == url()->current() ? 'active' : '' }}">
    <a href="{{ $routeUrl }}" class="menu-link">
        <div>{{ $slot }}</div>
    </a>
</li>
