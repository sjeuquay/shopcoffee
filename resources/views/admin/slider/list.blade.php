@extends('admin.layout')

@section('title', 'Slider List')

@section('content')

    {{-- Tittle --}}
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="fs-4">Quản lý slider</div>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Thêm slider
        </a>
    </div>
    @if (session('response_message'))
        {!! session('response_message') !!}
    @endif
    <div class="table-resposive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Slider index</th>
                    <th scope="col">Slider content</th>
                    <th scope="col">Hoạt động</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slider as $sl)
                    <tr>
                        <th scope="row">{{ $sl->id }}</th>
                        <td>
                            <img src="{{ asset('img/slider/' . $sl->slide_image) }}" class="img-fluid" width='200px'>
                        </td>
                        <td>{{ $sl->slide_index }}</td>
                        <td>{{ $sl->slide_content }}</td>
                        <td>
                            <div class="d-flex gap-3">
                                <div class="badge {{ $sl->active == 'enable' ? 'text-bg-primary' : 'text-bg-danger' }}">
                                    {{ $sl->active }}</div>
                                <div class="dropdown">
                                    <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false"></i>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.sliders.edit', ['slider' => $sl->id]) }}">Sửa</a>
                                        </li>
                                        <li>
                                            <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#confirm-delete" data-bs-deleteId="{{ $sl->id }}">
                                                {{-- #ten+ id  --}}
                                                Xóa
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete" method="delete" action="{{ route('admin.sliders.destroy', '') }}"
        varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa slider này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}
@endsection
