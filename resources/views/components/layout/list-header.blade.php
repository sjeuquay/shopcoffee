<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
@php
    /**
     * TAG x-layout.list-header
     * @param string $targetModal The ID of the modal
     * @param slot $title The ID of the modal
     * @param slot $slot The ID of the modal
     */
@endphp
@props([
    'targetModal' => 'formID',
])
<div class="d-flex justify-content-between">
    <div class="d-flex gap-3 align-items-center">
        <h3 class="m-0">
            {{ $title ?? 'List Header title' }}
        </h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{ $targetModal }}">Thêm +</button>
        @if (session('response_message'))
            {!! session('response_message') !!}
        @endif
    </div>
    <form class="search input-group w-auto">
        <label for="search" class="input-group-text">
            <i class="bi bi-search"></i>
        </label>
        <input id="search" type="text" class="form-control" placeholder="Search">
    </form>
</div>
