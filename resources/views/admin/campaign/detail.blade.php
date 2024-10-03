@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <!-- Tiêu đề trang -->
                <h5 class="card-title fw-semibold mb-4">Chi tiết chiến dịch: Chiến dịch A</h5>

                <!-- Thông tin tổng quan chiến dịch -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Tên chiến dịch</h6>
                        <p>Chiến dịch A</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Trạng thái</h6>
                        <span class="badge badge-success">Đang hoạt động</span>
                    </div>
                </div>

                <!-- Thông tin ngày bắt đầu và kết thúc -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Ngày bắt đầu</h6>
                        <p>01-10-2024</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Ngày kết thúc</h6>
                        <p>31-10-2024</p>
                    </div>
                </div>

                <!-- Mô tả chiến dịch -->
                <div class="mb-4">
                    <h6 class="fw-semibold">Mô tả</h6>
                    <p>Đây là chiến dịch nhằm tăng số lượng người theo dõi và quảng bá thương hiệu cho sản phẩm mới.</p>
                </div>

                <!-- Số lượng người theo dõi yêu cầu -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Số lượng người theo dõi yêu cầu</h6>
                        <p>10,000</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Loại trừ danh sách đen</h6>
                        <p>Có</p>
                    </div>
                </div>

                <!-- Người tạo chiến dịch -->
                <div class="mb-4">
                    <h6 class="fw-semibold">Người tạo</h6>
                    <p>Nguyễn Văn A (Admin)</p>
                </div>

                <!-- File đính kèm -->
                <div class="mb-4">
                    <h6 class="fw-semibold">Tệp đính kèm</h6>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            File_Chiendich_A.docx
                            <a href="#" class="btn btn-sm btn-secondary">Tải xuống</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Hình ảnh_sản_phẩm.png
                            <a href="#" class="btn btn-sm btn-secondary">Tải xuống</a>
                        </li>
                    </ul>
                </div>

                <!-- Danh sách đăng ký creator -->
                <div class="mb-4">
                    <h6 class="fw-semibold">Danh sách Creator đăng ký</h6>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên Creator</th>
                            <th scope="col">Số lượng người theo dõi</th>
                            <th scope="col">Liên kết mạng xã hội</th>
                            <th scope="col">Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Trần B</td>
                            <td>15,000</td>
                            <td><a href="https://facebook.com/creatorB">https://facebook.com/creatorB</a></td>
                            <td><span class="badge badge-warning">Đang chờ duyệt</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Nguyễn C</td>
                            <td>20,000</td>
                            <td><a href="https://instagram.com/creatorC">https://instagram.com/creatorC</a></td>
                            <td><span class="badge badge-success">Đã duyệt</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Lê D</td>
                            <td>25,000</td>
                            <td><a href="https://youtube.com/creatorD">https://youtube.com/creatorD</a></td>
                            <td><span class="badge badge-danger">Từ chối</span></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Phạm E</td>
                            <td>30,000</td>
                            <td><a href="https://tiktok.com/creatorE">https://tiktok.com/creatorE</a></td>
                            <td><span class="badge badge-warning">Đang chờ duyệt</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Lịch sử phê duyệt -->
                <div class="mb-4">
                    <h6 class="fw-semibold">Lịch sử phê duyệt</h6>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Nguyễn Văn A đã phê duyệt Creator Nguyễn C vào ngày 02-10-2024</span>
                            <span class="badge badge-success">Phê duyệt</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Nguyễn Văn B đã từ chối Creator Lê D vào ngày 03-10-2024</span>
                            <span class="badge badge-danger">Từ chối</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Nguyễn Văn A đã phê duyệt Creator Trần B vào ngày 01-10-2024</span>
                            <span class="badge badge-warning">Đang chờ duyệt</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <style>
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-warning {
            background-color: #ffc107;
        }

        .badge-danger {
            background-color: #dc3545;
        }
    </style>
@endsection
