@switch($status_id->status_code ?? '0')
    @case(1)
        <td>
            <span class="badge bg-label-secondary me-1">{{ $status_id->description }}</span>
        </td>
    @break

    @case(2)
        <td>
            <span class="badge bg-label-info me-1">{{ $status_id->description }}</span>
        </td>
    @break

    @case(3)
        <td>
            <span class="badge bg-label-warning me-1">{{ $status_id->description }}</span>
        </td>
    @break

    @case(4)
        <td>
            <span class="badge bg-label-success me-1">{{ $status_id->description }}</span>
        </td>
    @break

    @case(5)
        <td>
            <span class="badge bg-label-danger me-1">{{ $status_id->description }}</span>
        </td>
    @break

    @default
        <td>
            <span class="badge bg-label-danger me-1">Lỗi status</span>
        </td>
@endswitch
