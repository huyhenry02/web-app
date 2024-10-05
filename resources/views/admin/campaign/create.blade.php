@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tạo mới chiến dịch</h5>

                <form action="{{ route('admin.campaign.create') }}" enctype="multipart/form-data" method="post" >
                    @csrf
                    <div class="form-group mb-3">
                        <label for="campaignName" class="form-label">Tên chiến dịch</label>
                        <input type="text" class="form-control" id="campaignName" placeholder="Nhập tên chiến dịch" name="name"
                               required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="Nhập mô tả chi tiết" name="description"
                                  required></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="startDate" class="form-label">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="startDate" name="start_date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="endDate" class="form-label">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="endDate" name="end_date" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="fileInput" class="form-label">Banner</label>
                        <input type="file" class="form-control" id="fileInput" accept="image/*" name="file" multiple>
                        <div id="filePreview" class="mt-3">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="followerRequired" class="form-label">Số lượng người theo dõi yêu cầu</label>
                        <input type="number" class="form-control" id="followerRequired"
                               placeholder="Nhập số lượng người theo dõi yêu cầu" name="follower_required" required>
                    </div>

                    <div class="form-group form-check mb-3">
                        <input type="checkbox" class="form-check-input" name="blacklist_excluded" id="blacklistExcluded">
                        <label class="form-check-label" for="blacklistExcluded">Loại trừ danh sách đen</label>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tạo chiến dịch</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        #filePreview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        #filePreview img {
            width: 650px;
            height: 300px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
        }
    </style>

    <script>
        document.getElementById('fileInput').addEventListener('change', function (event) {
            const files = event.target.files;
            const filePreview = document.getElementById('filePreview');
            filePreview.innerHTML = '';

            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        filePreview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
            }
        });


    </script>
@endsection
