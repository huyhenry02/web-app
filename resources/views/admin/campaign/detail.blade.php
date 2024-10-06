@php use App\Models\Campaign; @endphp
@php use App\Models\ApprovalHistory; @endphp
@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title mb-4">
                    <span class="fw-bold" style="font-size: 1.25rem; color: #333;">Thông tin chiến dịch:</span>
                    <span  style="font-size: 1rem; color: #666;">{{ $campaign->name ?? '' }}</span>
                </h5>



                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Tên chiến dịch</h6>
                        <p>{{ $campaign->name ?? '' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Trạng thái</h6>
                        @switch( $campaign->status )
                            @case( $campaign->status === Campaign::STATUS_ACTIVE )
                                <span class="badge badge-primary" style="width: 130px">Đang hoạt động</span>
                                @break
                            @case( $campaign->status === Campaign::STATUS_COMPLETED )
                                <span class="badge badge-success" style="width: 130px">Hoàn thành</span>
                                @break
                            @case( $campaign->status === Campaign::STATUS_PENDING )
                                <span class="badge badge-warning" style="width: 130px">Chuẩn bị</span>
                                @break
                        @endswitch
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Ngày bắt đầu</h6>
                        <p>{{ $campaign->start_date ?? '' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Ngày kết thúc</h6>
                        <p>{{ $campaign->end_date ?? '' }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-semibold">Mô tả</h6>
                    <p>{{ $campaign->description ?? '' }}</p>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Số lượng người theo dõi yêu cầu</h6>
                        <p>{{ $campaign->follower_required ?? '' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Loại trừ danh sách đen</h6>
                        @switch($campaign->blacklist_excluded)
                            @case( true )
                                <p>Có</p>
                                @break
                            @case( false )
                                <p>Không</p>
                                @break
                        @endswitch
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-semibold">Người tạo</h6>
                    <p>{{ $campaign->createdBy?->name ?? '' }}</p>
                </div>

                <div class="mb-4">
                    <h6 class="fw-semibold">Banner</h6>
                    <img src="{{ $campaign->file?->file_path ? asset($campaign->file->file_path) : '/assets/images/no_image_custom.jpg' }}" alt="Banner" style="width: 650px; height: 366px; object-fit: cover;">
                </div>

                <div class="mb-4">
                    <h6 class="fw-semibold">Danh sách Creator đăng ký</h6>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên Creator</th>
                            <th scope="col">Số lượng người theo dõi</th>
                            <th scope="col">Liên kết mạng xã hội</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $campaignRegistrations as $key => $campaignRegistration )
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $campaignRegistration->creator?->user?->name ?? '' }}</td>
                                <td>{{ $campaignRegistration->creator?->follower_count ?? '' }}</td>
                                <td>
                                    <a href="{{ $campaignRegistration->creator?->social_media_link ?? '#' }}">{{ $campaignRegistration->creator?->social_media_link ?? '' }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mb-4">
                    <h6 class="fw-semibold">Lịch sử phê duyệt</h6>
                    <ul class="list-group approval-history-list">
                        @foreach( $approvalHistories as $approvalHistory )
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="approval-info">
                                    <span class="admin-name">{{ $approvalHistory->admin?->name ?? 'Admin' }}</span>
                                    <span class="action">
                                        @switch( $approvalHistory->action )
                                            @case( $approvalHistory->action === ApprovalHistory::ACTION_REJECTED )
                                                <span class="badge badge-danger">đã từ chối</span>
                                                @break
                                            @case( $approvalHistory->action === ApprovalHistory::ACTION_APPROVED )
                                                <span class="badge badge-success">đã duyệt</span>
                                                @break
                                        @endswitch
                                    </span>
                                    <span
                                        class="creator-name">Creator: {{ $approvalHistory->creator?->user?->name ?? 'N/A' }}</span>
                                    <span
                                        class="date-time">{{ $approvalHistory->created_at->format('d/m/Y H:i') ?? '' }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>

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
