@php use App\Models\Campaign; @endphp
<tbody>
@foreach($campaigns as $campaign)
    <tr>
        <td>{{ $campaign->id ?? '' }}</td>
        <td>{{ $campaign->code ?? '' }}</td>
        <td>{{ $campaign->name ?? '' }}</td>
        <td>
            @switch( $campaign->status )
                @case( $campaign->status === Campaign::STATUS_ACTIVE )
                    <span class="badge badge-primary">Đang hoạt động</span>
                    @break
                @case( $campaign->status === Campaign::STATUS_COMPLETED )
                    <span class="badge badge-success">Hoàn thành</span>
                    @break
                @case( $campaign->status === Campaign::STATUS_PENDING )
                    <span class="badge badge-warning">Chuẩn bị</span>
                    @break
            @endswitch
        </td>
        <td>{{ $campaign->createdBy?->name ?? '' }}</td>
        <td>
            <a href="{{ route('admin.campaign.detail', $campaign->id) }}" class="btn btn-sm btn-info">Xem</a>
            <a href="{{ route('admin.campaign.update', $campaign->id) }}" class="btn btn-sm btn-warning">Sửa</a>
            <a href="{{ route('admin.campaign.delete', $campaign->id) }}" class="btn btn-sm btn-danger">Xóa</a>
        </td>
    </tr>
@endforeach
</tbody>
