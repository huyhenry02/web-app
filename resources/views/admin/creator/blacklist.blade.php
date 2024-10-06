@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Danh sách đen Creators</h5>

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h6 class="fw-semibold">Tổng số Creators trong danh sách đen: <span id="total-blacklisted">{{ $count ?? 0 }}</span></h6>
                    <div>
                        <button class="btn btn-success" id="restoreSelectedBtn" onclick="restoreSelectedCreators()" disabled>Khôi phục đã chọn</button>
                    </div>
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
                    @foreach($inactiveCreators as $key => $creator)
                        <tr>
                            <td><input type="checkbox" class="creatorCheckbox" value="{{ $creator->id }}" data-name="{{ $creator->user?->name }}"></td>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $creator->user?->name ?? '' }}</td>
                            <td>{{ $creator->follower_count ?? '' }}</td>
                            <td><a href="{{ $creator->social_media_link ?? '' }}" target="_blank">{{ $creator->platform ?? '' }}</a></td>
                            <td>{{ $creator->platform ?? '' }}</td>
                            <td>{{ $creator->ban_reason ?? '' }}</td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="openRestoreModalSingle('{{ $creator->id }}', '{{ $creator->user?->name }}')">Khôi phục</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form id="restoreForm" method="POST" action="{{ route('admin.creator.restore.multiple') }}">
        @csrf
        <input type="hidden" name="creator_ids" id="creatorIdsInput">
    </form>

    <div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="restoreModalLabel">Xác nhận khôi phục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn khôi phục những creators đã chọn không?</p>
                    <ul id="creatorListRestore"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-success" onclick="submitRestoreForm()">Xác nhận khôi phục</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleAll(source) {
            const checkboxes = document.querySelectorAll('.creatorCheckbox');
            checkboxes.forEach(checkbox => checkbox.checked = source.checked);
            toggleRestoreSelectedBtn();
        }

        function toggleRestoreSelectedBtn() {
            const anyChecked = document.querySelectorAll('.creatorCheckbox:checked').length > 0;
            document.getElementById('restoreSelectedBtn').disabled = !anyChecked;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.creatorCheckbox');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', toggleRestoreSelectedBtn);
            });
        });

        function openRestoreModalSingle(creatorId, creatorName) {
            document.getElementById('creatorListRestore').innerHTML = `<li>${creatorName}</li>`;
            document.getElementById('creatorIdsInput').value = creatorId;
            const restoreModal = new bootstrap.Modal(document.getElementById('restoreModal'));
            restoreModal.show();
        }

        function restoreSelectedCreators() {
            const selectedCreators = document.querySelectorAll('.creatorCheckbox:checked');
            const creatorList = document.getElementById('creatorListRestore');
            const creatorIds = [];

            creatorList.innerHTML = '';
            selectedCreators.forEach(checkbox => {
                creatorIds.push(checkbox.value);
                const li = document.createElement('li');
                li.textContent = checkbox.dataset.name;
                creatorList.appendChild(li);
            });

            document.getElementById('creatorIdsInput').value = creatorIds.join(',');
            const restoreModal = new bootstrap.Modal(document.getElementById('restoreModal'));
            restoreModal.show();
        }

        function restoreAllCreators() {
            document.getElementById('creatorIdsInput').value = 'all';
            const creatorList = document.getElementById('creatorListRestore');
            creatorList.innerHTML = '<li>All Creators</li>';
            const restoreModal = new bootstrap.Modal(document.getElementById('restoreModal'));
            restoreModal.show();
        }

        function submitRestoreForm() {
            document.getElementById('restoreForm').submit();
        }
    </script>
@endsection
