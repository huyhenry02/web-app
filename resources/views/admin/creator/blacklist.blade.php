@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Danh sách đen Creators</h5>

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h6 class="fw-semibold">Tổng số Creators trong danh sách đen: <span id="total-blacklisted">3</span>
                    </h6>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col"><input type="checkbox" id="selectAll" onclick="toggleAll(this)"></th>
                        <th scope="col">STT</th>
                        <th scope="col">Tên Creator</th>
                        <th scope="col">Số lượng người theo dõi</th>
                        <th scope="col">Liên kết mạng xã hội</th>
                        <th scope="col">Nền tảng</th>
                        <th scope="col">Lý do cấm</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="checkbox" class="blacklistCheckbox"></td>
                        <td>1</td>
                        <td>Nguyễn A</td>
                        <td>50,000</td>
                        <td><a href="https://facebook.com/creatorA" target="_blank">Facebook</a></td>
                        <td>Facebook</td>
                        <td>Spam nội dung không phù hợp</td>
                        <td>
                            <button class="btn btn-sm btn-success" onclick="openRestoreModal('Nguyễn A')">Khôi phục
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="blacklistCheckbox"></td>
                        <td>2</td>
                        <td>Lê B</td>
                        <td>30,000</td>

                        <td><a href="https://instagram.com/creatorB" target="_blank">Instagram</a></td>
                        <td>Instagram</td>
                        <td>Vi phạm quy tắc cộng đồng</td>
                        <td>
                            <button class="btn btn-sm btn-success" onclick="openRestoreModal('Lê B')">Khôi phục</button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="blacklistCheckbox"></td>
                        <td>3</td>
                        <td>Phạm C</td>
                        <td>40,000</td>
                        <td><a href="https://tiktok.com/creatorC" target="_blank">TikTok</a></td>
                        <td>TikTok</td>
                        <td>Tung tin sai lệch</td>
                        <td>
                            <button class="btn btn-sm btn-success" onclick="openRestoreModal('Phạm C')">Khôi phục
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="restoreModalLabel">Xác nhận khôi phục Creator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn khôi phục creator <strong id="creatorToRestore"></strong> về trạng thái bình
                    thường?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-success" onclick="confirmRestore()">Xác nhận khôi phục</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script>
        function openRestoreModal(creatorName) {
            document.getElementById('creatorToRestore').textContent = creatorName;
            const restoreModal = new bootstrap.Modal(document.getElementById('restoreModal'));
            restoreModal.show();
        }

        function confirmRestore() {
            // Xử lý hành động khôi phục ở đây
            alert("Creator đã được khôi phục về trạng thái bình thường.");
            const restoreModal = bootstrap.Modal.getInstance(document.getElementById('restoreModal'));
            restoreModal.hide();
        }
    </script>
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
        }
    </style>
@endsection
