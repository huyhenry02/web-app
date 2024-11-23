@php use App\Models\ApprovalHistory; @endphp
@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Danh sách yêu cầu chờ duyệt</h5>

                <div class="mb-4">
                    <h6 class="fw-semibold">Tổng số yêu cầu chờ duyệt: <span
                            id="total-requests">{{ $approvalHistories->count() ?? 0 }}</span></h6>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên Creator</th>
                        <th scope="col">Số lượng người theo dõi</th>
                        <th scope="col">Liên kết mạng xã hội</th>
                        <th scope="col">Loại yêu cầu</th>
                        <th scope="col">Chiến dịch</th>
                        <th scope="col" class="text-lg-end">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $approvalHistories as $key => $val )
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>{{ $val->creator?->user?->name ?? '' }}</td>
                            <td>{{ $val->creator?->follower_count ?? '' }}</td>
                            <td>
                                <a href="{{ $val->creator?->platform ?? '' }}"> {{ $val->creator?->platform ?? '' }} </a>
                            </td>
                            <td>
                                @if( $val->type === ApprovalHistory::TYPE_REQUEST_JOIN )
                                    <span class="badge bg-primary">Yêu cầu tham gia</span>
                                @else
                                    <span class="badge bg-danger">Yêu cầu rời khỏi</span>
                            @endif
                            <td>
                                <a href="{{ route('admin.campaign.detail', $val->campaign_id) }}">
                                    {{ $val->campaign?->name ?? '' }}
                                </a>
                            </td>
                            <td class="text-lg-end">
                                <button class="btn btn-sm btn-success"
                                        onclick="openApproveModal('{{ $val->creator?->user?->name ?? '' }}', {{ $val->id }})">
                                    Duyệt
                                </button>
                                <button class="btn btn-sm btn-danger"
                                        onclick="openRejectModal('{{ $val->creator?->user?->name ?? '' }}', {{ $val->id }})">
                                    Từ chối
                                </button>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approveModalLabel">Xác nhận duyệt yêu cầu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn duyệt yêu cầu của <strong id="creatorNameApprove"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-success" id="approveConfirmBtn">Xác nhận duyệt</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Xác nhận từ chối yêu cầu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn từ chối yêu cầu của <strong id="creatorNameReject"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="rejectConfirmBtn">Xác nhận từ chối</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openApproveModal(creatorName, requestId) {
            document.getElementById('creatorNameApprove').textContent = creatorName;
            var approveModal = new bootstrap.Modal(document.getElementById('approveModal'));
            approveModal.show();

            document.getElementById('approveConfirmBtn').onclick = function () {
                approveRequest(requestId);
            };
        }

        function openRejectModal(creatorName, requestId) {
            document.getElementById('creatorNameReject').textContent = creatorName;
            var rejectModal = new bootstrap.Modal(document.getElementById('rejectModal'));
            rejectModal.show();

            document.getElementById('rejectConfirmBtn').onclick = function () {
                rejectRequest(requestId);
            };
        }

        function approveRequest(requestId) {
            $.ajax({
                url: '{{ route('admin.campaign.approve') }}',
                type: 'POST',
                data: {
                    id: requestId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    alert(response.success);
                    location.reload();
                }
            });
        }

        function rejectRequest(requestId) {
            $.ajax({
                url: '{{ route('admin.campaign.reject') }}',
                type: 'POST',
                data: {
                    id: requestId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    alert(response.success);
                    location.reload();
                }
            });
        }

    </script>
@endsection
