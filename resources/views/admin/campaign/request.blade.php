@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Danh sách yêu cầu chờ duyệt</h5>

                <div class="mb-4">
                    <h6 class="fw-semibold">Tổng số yêu cầu chờ duyệt: <span id="total-requests">4</span></h6>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên Creator</th>
                        <th scope="col">Số lượng người theo dõi</th>
                        <th scope="col">Liên kết mạng xã hội</th>
                        <th scope="col">Chiến dịch</th>
                        <th scope="col" class="text-lg-end">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Trần B</td>
                        <td>15,000</td>
                        <td><a href="https://facebook.com/creatorB">https://facebook.com/creatorB</a></td>
                        <td><a href="/campaign-detail/1">Chiến dịch A</a></td>
                        <td class="text-lg-end">
                            <button class="btn btn-sm btn-success" onclick="openApproveModal('Trần B')">Duyệt</button>
                            <button class="btn btn-sm btn-danger" onclick="openRejectModal('Trần B')">Từ chối</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Nguyễn C</td>
                        <td>20,000</td>
                        <td><a href="https://instagram.com/creatorC">https://instagram.com/creatorC</a></td>
                        <td><a href="/campaign-detail/2">Chiến dịch B</a></td>
                        <td class="text-lg-end">
                            <button class="btn btn-sm btn-success" onclick="openApproveModal('Nguyễn C')">Duyệt</button>
                            <button class="btn btn-sm btn-danger" onclick="openRejectModal('Nguyễn C')">Từ chối</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Lê D</td>
                        <td>25,000</td>
                        <td><a href="https://youtube.com/creatorD">https://youtube.com/creatorD</a></td>
                        <td><a href="/campaign-detail/1">Chiến dịch A</a></td>
                        <td class="text-lg-end">
                            <button class="btn btn-sm btn-success" onclick="openApproveModal('Lê D')">Duyệt</button>
                            <button class="btn btn-sm btn-danger" onclick="openRejectModal('Lê D')">Từ chối</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Phạm E</td>
                        <td>30,000</td>
                        <td><a href="https://tiktok.com/creatorE">https://tiktok.com/creatorE</a></td>
                        <td><a href="/campaign-detail/3">Chiến dịch C</a></td>
                        <td class="text-lg-end">
                            <button class="btn btn-sm btn-success" onclick="openApproveModal('Phạm E')">Duyệt</button>
                            <button class="btn btn-sm btn-danger" onclick="openRejectModal('Phạm E')">Từ chối</button>
                        </td>
                    </tr>
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
                    <button type="button" class="btn btn-success">Xác nhận duyệt</button>
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
                    <button type="button" class="btn btn-danger">Xác nhận từ chối</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openApproveModal(creatorName) {
            document.getElementById('creatorNameApprove').textContent = creatorName;
            var approveModal = new bootstrap.Modal(document.getElementById('approveModal'));
            approveModal.show();
        }

        function openRejectModal(creatorName) {
            document.getElementById('creatorNameReject').textContent = creatorName;
            var rejectModal = new bootstrap.Modal(document.getElementById('rejectModal'));
            rejectModal.show();
        }
    </script>
@endsection
