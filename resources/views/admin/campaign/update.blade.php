@php use App\Models\Campaign; @endphp
@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title mb-4">
                    <span class="fw-bold" style="font-size: 1.25rem; color: #333;">Chỉnh sửa chiến dịch:</span>
                    <span style="font-size: 1rem; color: #666;">{{ $campaign->code ?? '' }}</span>
                </h5>

                <form>
                    <div class="form-group mb-3">
                        <label for="campaignName" class="form-label">Tên chiến dịch</label>
                        <input type="text" class="form-control" id="campaignName" placeholder="Nhập tên chiến dịch"
                               value="{{ $campaign -> name ?? '' }}" name="name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="Nhập mô tả chi tiết" name="description"
                                  >{{ $campaign -> description ?? '' }}</textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="startDate" class="form-label">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="startDate"
                                   value="{{ $campaign -> start_date ?? '' }}" name="start_date" >
                        </div>
                        <div class="col-md-6">
                            <label for="endDate" class="form-label">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="endDate"
                                   value="{{ $campaign -> end_date ?? '' }}" name="end_date" >
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select class="form-control" id="status" name="status">
                            <option value="pending"
                                    selected>{{ $campaign -> status ? Campaign::TRANSLATED_STATUS[$campaign -> status] : '' }}</option>
                            <option value="{{ Campaign::STATUS_PENDING }}">Đang chờ</option>
                            <option value="{{ Campaign::STATUS_ACTIVE }}">Đang hoạt động</option>
                            <option value="{{ Campaign::STATUS_COMPLETED }}">Hoàn thành</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fileInput" class="form-label">Banner</label>
                        <input type="file" class="form-control" id="fileInput" accept="image/*" name="file" multiple>
                        <div id="filePreview" class="mt-3">
                            <img src="{{ $campaign->file?->file_path ? asset($campaign->file->file_path) : '/assets/images/no_image_custom.jpg' }}" alt="Banner" style="width: 650px; height: 366px; object-fit: cover;">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="follower" class="form-label">Số lượng người theo dõi yêu cầu</label>
                        <input type="number" class="form-control" id="follower"
                               placeholder="Nhập số lượng người theo dõi yêu cầu"
                               value="{{ $campaign -> follower_required ?? '' }}" name="follower_required" >
                    </div>

                    <div class="form-group form-check mb-3">
                        <input type="checkbox" class="form-check-input"
                               id="blacklistExcluded" {{ $campaign->blacklist_excluded === 1 ? 'checked' : ''}} name="blacklist_excluded">
                        <label class="form-check-label" for="blacklistExcluded">Loại trừ danh sách đen</label>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Lưu</button>
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
            height: 366px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
        }
    </style>
    <script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;
                    imgElement.style.width = '650px';
                    imgElement.style.height = '366px';
                    imgElement.style.objectFit = 'cover';
                    imgElement.style.border = '1px solid #ddd';
                    imgElement.style.borderRadius = '5px';
                    imgElement.style.padding = '5px';

                    document.getElementById('filePreview').innerHTML = '';
                    document.getElementById('filePreview').appendChild(imgElement);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
