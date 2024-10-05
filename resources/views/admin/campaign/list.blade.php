@php use App\Models\Campaign; @endphp
@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title">Danh sách chiến dịch</h3>
                    <a href="{{ route('admin.campaign.show_create') }}" class="btn btn-primary">Thêm mới</a>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã chiến dịch</th>
                        <th scope="col">Tên chiến dịch</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Người tạo</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
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
                                <a
                                    href="{{ route('admin.campaign.detail', $campaign->id) }}" class="btn btn-sm btn-info">Xem</a>
                                <a
                                    href="{{ route('admin.campaign.update', $campaign->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                <a
                                    href="{{ route('admin.campaign.delete', $campaign->id) }}" class="btn btn-sm btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .badge-success {
            background-color: #d4edda;
            color: #155724;
            width: 135px;
        }

        .badge-primary {
            background-color: #cce5ff;
            color: #004085;
            width: 135px;
        }

        .badge-warning {
            background-color: #fff3cd;
            color: #856404;
            width: 135px;
        }
    </style>
@endsection
