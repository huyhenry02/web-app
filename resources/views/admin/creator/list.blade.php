@extends('admin.layouts.main')
@section('content')
    <!--  Header End -->
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Danh sách các Creators</h5>

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h6 class="fw-semibold">Tổng số Creators: <span id="total-creators">4</span></h6>
                    <button class="btn btn-danger" id="banSelectedBtn" onclick="banSelectedCreators()" disabled>
                        Cấm đã chọn
                    </button>
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
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="checkbox" class="creatorCheckbox" data-name="Trần B"></td>
                        <td>1</td>
                        <td>Trần B</td>
                        <td>15,000</td>
                        <td><a href="https://facebook.com/creatorB" target="_blank">Facebook</a></td>
                        <td>Facebook</td>
                        <td><span class="badge bg-success">Hoạt động</span></td>
                        <td>
                            <a href="/creator-detail/1" class="btn btn-sm btn-info">Xem chi tiết</a>
                            <button class="btn btn-sm btn-danger" onclick="openBanModal('Trần B')">Cấm</button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="creatorCheckbox" data-name="Nguyễn C"></td>
                        <td>2</td>
                        <td>Nguyễn C</td>
                        <td>20,000</td>
                        <td><a href="https://instagram.com/creatorC" target="_blank">Instagram</a></td>
                        <td>Instagram</td>
                        <td><span class="badge bg-success">Hoạt động</span></td>
                        <td>
                            <a href="/creator-detail/2" class="btn btn-sm btn-info">Xem chi tiết</a>
                            <button class="btn btn-sm btn-danger" onclick="openBanModal('Nguyễn C')">Cấm</button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="creatorCheckbox" data-name="Lê D"></td>
                        <td>3</td>
                        <td>Lê D</td>
                        <td>25,000</td>
                        <td><a href="https://youtube.com/creatorD" target="_blank">YouTube</a></td>
                        <td>YouTube</td>
                        <td><span class="badge bg-danger">Bị cấm</span></td>
                        <td>
                            <a href="/creator-detail/3" class="btn btn-sm btn-info">Xem chi tiết</a>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="creatorCheckbox" data-name="Phạm E"></td>
                        <td>4</td>
                        <td>Phạm E</td>
                        <td>30,000</td>
                        <td><a href="https://tiktok.com/creatorE" target="_blank">TikTok</a></td>
                        <td>TikTok</td>
                        <td><span class="badge bg-warning">Danh sách đen</span></td>
                        <td>
                            <a href="/creator-detail/4" class="btn btn-sm btn-info">Xem chi tiết</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal cấm creators -->
    <div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="banModalLabel">Xác nhận cấm Creators</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn cấm các Creators sau đây?
                    <ul id="creatorListBan"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" onclick="confirmBan()">Xác nhận cấm</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleAll(source) {
            const checkboxes = document.querySelectorAll('.creatorCheckbox');
            checkboxes.forEach(checkbox => checkbox.checked = source.checked);
            toggleBanSelectedBtn();
        }

        function toggleBanSelectedBtn() {
            const anyChecked = document.querySelectorAll('.creatorCheckbox:checked').length > 0;
            document.getElementById('banSelectedBtn').disabled = !anyChecked;
        }

        document.querySelectorAll('.creatorCheckbox').forEach(checkbox => {
            checkbox.addEventListener('change', toggleBanSelectedBtn);
        });

        function banSelectedCreators() {
            const selectedCreators = document.querySelectorAll('.creatorCheckbox:checked');
            const creatorList = document.getElementById('creatorListBan');
            creatorList.innerHTML = '';
            selectedCreators.forEach(checkbox => {
                const li = document.createElement('li');
                li.textContent = checkbox.dataset.name;
                creatorList.appendChild(li);
            });

            const banModal = new bootstrap.Modal(document.getElementById('banModal'));
            banModal.show();
        }

        function confirmBan() {
            alert("Các creators đã bị cấm.");
            const banModal = bootstrap.Modal.getInstance(document.getElementById('banModal'));
            banModal.hide();
        }
    </script>

@endsection
