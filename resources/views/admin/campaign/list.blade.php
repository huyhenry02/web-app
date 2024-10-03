@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title">Danh sách chiến dịch</h3>
                    <a href="create-campaign.html" class="btn btn-primary">Thêm mới</a>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã chiến dịch</th>
                        <th scope="col">Tên chiến dịch</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Người tạo</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>CD001</td>
                        <td>Chiến dịch A</td>
                        <td><span class="badge badge-success">Đang hoạt động</span></td>
                        <td>Nguyễn Văn A</td>
                        <td>
                            <a
                                href="detail-campaign.html" class="btn btn-sm btn-info">Xem</a>
                            <a
                                href="#" class="btn btn-sm btn-warning">Sửa</a>
                            <a
                                href="#" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
