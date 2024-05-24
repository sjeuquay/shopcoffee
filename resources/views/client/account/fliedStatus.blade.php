@switch($status_id->status_code)
    @case(1)
        <small class="text-dark ms-2">{{ $status_id->description }}</small>
    @break

    @case(2)
        <small class="text-info ms-2">{{ $status_id->description }}</small>
    @break

    @case(3)
        <small class="text-warning ms-2">{{ $status_id->description }}</small>
    @break

    @case(4)
        <small class="text-success ms-2">{{ $status_id->description }}</small>
    @break

    @case(5)
        <small class="text-danger ms-2">{{ $status_id->description }}</small>
    @break

    @default
        <small class="text-body-tertiary ms-2">Chờ xử lý</small>
    @break
@endswitch
