@extends('admin.layout')

@section('title', 'Vendor')

@section('content')
    <x-layout.list-header targetModal="create_vendor-modal">
        <x-slot name="title">Danh sách đại lý</x-slot>
    </x-layout.list-header>
    <div id="accordion-parent" class="list-container my-3 d-flex flex-column gap-2 parent">

        {{-- START - VENDOR ITEM --}}
        @include('admin.vendor.index.list')
        {{-- END - VENDOR ITEM --}}


        {{-- CREATE VENDOR MODAL --}}
        @include('admin.vendor.index.create')

    </div>
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link bg-secondary text-white" href="#">Trước</a></li>
            <li class="page-item"><a class="page-link bg-primary text-white" href="#">1</a></li>
            <li class="page-item"><a class="page-link bg-secondary text-white" href="#">2</a></li>
            <li class="page-item"><a class="page-link bg-secondary text-white" href="#">3</a></li>
            <li class="page-item"><a class="page-link bg-secondary text-white" href="#">Tiếp theo</a></li>
        </ul>
    </nav>

@endsection
