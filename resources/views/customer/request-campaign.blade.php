@extends('customer.layouts.main')
@section('content')
    <!-- Heading -->
    <div id="heading" class="text-center">
        <h1>Yêu cầu của bạn</h1>
    </div>
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <!-- Campaigns Table -->
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên Chiến Dịch</th>
                        <th scope="col">Mã Chiến Dịch</th>
                        <th scope="col">Lý do tham gia</th>
                        <th scope="col">Ngày gửi yêu cầu</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Hành Động</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th scope="row">2</th>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>#CAM002</td>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>15/08/2024</td>
                        <td class="text-success" >Đang Tham Gia</td>
                        <td><a href="#" class="btn btn-primary btn-sm">Xem Chi Tiết</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>#CAM002</td>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>15/08/2024</td>
                        <td class="text-success" >Đang Tham Gia</td>
                        <td><a href="#" class="btn btn-primary btn-sm">Xem Chi Tiết</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>#CAM002</td>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>15/08/2024</td>
                        <td class="text-success" >Đang Tham Gia</td>
                        <td><a href="#" class="btn btn-primary btn-sm">Xem Chi Tiết</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>#CAM002</td>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>15/08/2024</td>
                        <td class="text-success" >Đang Tham Gia</td>
                        <td><a href="#" class="btn btn-primary btn-sm">Xem Chi Tiết</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>#CAM002</td>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>15/08/2024</td>
                        <td class="text-success" >Đang Tham Gia</td>
                        <td><a href="#" class="btn btn-primary btn-sm">Xem Chi Tiết</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>#CAM002</td>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>15/08/2024</td>
                        <td class="text-success" >Đang Tham Gia</td>
                        <td><a href="#" class="btn btn-primary btn-sm">Xem Chi Tiết</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>#CAM002</td>
                        <td>Giúp Đỡ Trẻ Em Vùng Xa</td>
                        <td>15/08/2024</td>
                        <td class="text-success" >Đang Tham Gia</td>
                        <td><a href="#" class="btn btn-primary btn-sm">Xem Chi Tiết</a></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <style>
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa;
        }
    </style>
@endsection
