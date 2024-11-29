@php use App\Models\Creator; @endphp
@extends('admin.layouts.main')
@section('content')
    <!-- Header End -->
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Danh sách các Creators</h5>

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h6 class="fw-semibold">Tổng số Creators: <span id="total-creators">{{ $count ?? 0 }}</span></h6>
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
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $creators as $key => $creator )
                        <tr>
                            <td>
                                <input type="checkbox" class="creatorCheckbox" value="{{ $creator->id }}"
                                       data-name="{{ $creator->id }} . {{ $creator->user?->name }}">
                            </td>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $creator->user?->name ?? '' }}</td>
                            <td>{{ $creator->follower_count ?? '' }}</td>
                            <td><a href="{{ $creator->social_media_link ?? '' }}"
                                   target="_blank">{{ $creator->platform ?? '' }}</a></td>
                            <td>{{ $creator->platform ?? '' }}</td>
                            <td>
                                <a href="{{ route('admin.creator.detail', $creator->id) }}" class="btn btn-sm btn-info">Xem chi tiết</a>
                                <button class="btn btn-sm btn-danger" onclick="openBanModalSingle('{{ $creator->id }}', '{{ $creator->user?->name }}')">Cấm</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form id="banForm" method="POST" action="{{ route('admin.creator.ban.multiple') }}">
        @csrf
        <input type="hidden" name="creator_ids" id="creatorIdsInput">
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
                        <div class="form-group">
                            <label for="banReason">Lý do cấm</label>
                            <input type="text" name="ban_reason" id="banReason" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-danger" onclick="submitBanForm()">Xác nhận cấm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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

        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.creatorCheckbox');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', toggleBanSelectedBtn);
            });
        });

        function banSelectedCreators() {
            const selectedCreators = document.querySelectorAll('.creatorCheckbox:checked');
            const creatorList = document.getElementById('creatorListBan');
            const creatorIds = [];

            creatorList.innerHTML = '';
            selectedCreators.forEach(checkbox => {
                creatorIds.push(checkbox.value);
                const li = document.createElement('li');
                li.textContent = checkbox.dataset.name;
                creatorList.appendChild(li);
            });

            document.getElementById('creatorIdsInput').value = creatorIds.join(',');

            const banModal = new bootstrap.Modal(document.getElementById('banModal'));
            banModal.show();
        }

        function openBanModalSingle(creatorId, creatorName) {
            const creatorList = document.getElementById('creatorListBan');
            creatorList.innerHTML = '';

            const li = document.createElement('li');
            li.textContent = creatorName;
            creatorList.appendChild(li);

            document.getElementById('creatorIdsInput').value = creatorId;

            const banModal = new bootstrap.Modal(document.getElementById('banModal'));
            banModal.show();
        }

        function submitBanForm() {
            document.getElementById('banForm').submit();
        }
    </script>


    <style>
        .badge-success {
            background-color: #d4edda;
            color: #155724;
            width: 135px;
        }

        .badge-danger {
            background-color: #d4edda;
            color: #a10606;
            width: 135px;
        }
    </style>
@endsection

