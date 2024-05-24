@extends('admin.layout')

@section('title', 'Danh sách thiết bị')

@section('content')

    <x-layout.list-header targetModal="create_equipment-modal">
        <x-slot name="title">Danh sách thiết bị</x-slot>
    </x-layout.list-header>

    <div id="accordion-parent" class="list-container my-3 d-flex flex-column gap-2 parent">


        {{-- START - EQUIPMENT ITEM --}}
        @include('admin.equipment.index.list')
        {{-- END - EQUIPMENT ITEM --}}

        {{-- CREATE EQUIPMENT FORM --}}
        @include('admin.equipment.index.create')

    </div>

@endsection
