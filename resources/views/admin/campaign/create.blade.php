@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tạo mới chiến dịch</h5>

                <form>
                    <div class="form-group mb-3">
                        <label for="campaignName" class="form-label">Tên chiến dịch</label>
                        <input type="text" class="form-control" id="campaignName" placeholder="Nhập tên chiến dịch"
                               required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="Nhập mô tả chi tiết"
                                  required></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="startDate" class="form-label">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="startDate" required>
                        </div>
                        <div class="col-md-6">
                            <label for="endDate" class="form-label">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="endDate" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select class="form-control" id="status" required>
                            <option value="pending">Đang chờ</option>
                            <option value="active">Đang hoạt động</option>
                            <option value="completed">Hoàn thành</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="followerRequired" class="form-label">Số lượng người theo dõi yêu cầu</label>
                        <input type="number" class="form-control" id="followerRequired"
                               placeholder="Nhập số lượng người theo dõi yêu cầu" required>
                    </div>

                    <div class="form-group form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="blacklistExcluded">
                        <label class="form-check-label" for="blacklistExcluded">Loại trừ danh sách đen</label>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tạo chiến dịch</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
