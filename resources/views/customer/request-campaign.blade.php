@extends('customer.layouts.main')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
             style="background-image: url('/customer/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Yêu cầu tham gia chiến dịch</h2>
                <ol>
                    <li><a href="#">Trang chủ</a></li>
                    <li>Yêu cầu</li>
                </ol>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Requests Section ======= -->
        <section id="requests" class="requests section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-12">

                        <!-- Requests List -->
                        <div class="card shadow-sm mb-5">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Danh sách yêu cầu hiện tại</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped align-middle">
                                        <thead class="table-light">
                                        <tr>
                                            <th scope="col">Mã yêu cầu</th>
                                            <th scope="col">Tên chiến dịch</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Ngày gửi yêu cầu</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span class="badge bg-warning">Đang chờ</span>
                                            </td>
                                            <td></td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm">Xem chi tiết</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Requests List -->

                    </div>
                </div>

            </div>
        </section><!-- End Requests Section -->

    </main><!-- End #main -->
@endsection
