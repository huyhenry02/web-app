@php use App\Models\Creator;use App\Models\Campaign; @endphp
@php use App\Models\ApprovalHistory; @endphp
@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title mb-4">
                    <span class="fw-bold" style="font-size: 1.25rem; color: #333;">Thông tin Creator:</span>
                    <span style="font-size: 1rem; color: #666;">{{ $creator->user?->name ?? '' }}</span>
                </h5>


                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Tên Creator</h6>
                        <p>{{ $creator->user?->name ?? '' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Trạng thái</h6>
                        @switch( $creator->status )
                            @case( $creator->status === Creator::STATUS_ACTIVE )
                                <span class="badge badge-primary" style="width: 130px">Đang hoạt động</span>
                                @break
                            @case( $creator->status === Creator::STATUS_BANNED )
                                <span class="badge badge-danger" style="width: 130px">Đã ban</span>
                                @break
                        @endswitch
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Nền tảng mạng xã hội hoạt động</h6>
                        <p>{{ $creator->platform ?? '' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Liên kết mạng xã hội</h6>
                        <a href="{{ $creator->social_media_link ?? '' }}"
                           target="_blank">{{ $creator->platform ?? '' }}</a>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Số lượng người theo dõi</h6>
                        <p>{{ $creator->follower_count ?? '' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Email</h6>
                        <p>{{ $creator->user?->email ?? '' }}</p>
                    </div>
                </div>
                <div class="mb-4">
                    <h6 class="fw-semibold">Số điện thoại</h6>
                    <p>{{ $creator->user?->phone ?? '' }}</p>
                </div>
                <div class="mb-4">
                    <h6 class="fw-semibold">Danh sách các chiến dịch đã tham gia</h6>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên Chiến dịch</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($ownerCampaigns))
                            @foreach( $ownerCampaigns as $key => $ownerCampaign )
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $ownerCampaign->campaign->name ?? '' }}</td>
                                    <td>
                                        <a href="{{ route('admin.campaign.detail', $ownerCampaign->id) }}"
                                           class="btn btn-sm btn-info">Xem chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        .approval-history-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .approval-history-list .list-group-item {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 15px;
            transition: background-color 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .approval-info {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
        }

        .approval-info .admin-name {
            font-weight: bold;
            font-size: 16px;
            color: #333;
        }

        .approval-info .badge {
            font-size: 13px;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .badge-success {
            background-color: #28a745 !important;
            width: 100px;
        }

        .badge-danger {
            background-color: #dc3545 !important;
            width: 100px;
        }

        .badge-warning {
            background-color: #ffc107 !important;
            width: 100px;
        }

        .badge-primary {
            background-color: #007bff !important;
            width: 100px;
        }

        .approval-info .creator-name {
            font-style: italic;
            font-size: 14px;
            color: #555;
        }

        .approval-info .date-time {
            font-size: 13px;
            color: #777;
            margin-left: auto;
        }
    </style>
@endsection
