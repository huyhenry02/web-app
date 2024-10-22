@extends('customer.layouts.main')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
             style="background-image: url('/customer/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Đăng ký</h2>
                <ol>
                    <li><a href="#">Trang chủ</a></li>
                    <li>Đăng ký</li>
                </ol>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Register Section ======= -->
        <section id="register" class="register section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">

                        <div class="card shadow-sm">
                            <div class="card-body p-5">

                                <h4 class="card-title text-center mb-4">Tạo tài khoản mới</h4>

                                <form action="{{ route('creator.postRegister') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên đầy đủ</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Nhập tên của bạn" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Nhập email của bạn" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               placeholder="Nhập số điện thoại của bạn" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="social_media_link" class="form-label">Link trang cá nhân</label>
                                        <input type="text" class="form-control" id="social_media_link"
                                               name="social_media_link" placeholder="Nhập link trang cá nhân" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="platform" class="form-label">Nền tảng</label>
                                        <input type="text" class="form-control" id="platform" name="platform"
                                               placeholder="Nhập tên nền tảng" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label">Địa chỉ</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                               placeholder="Nhập địa chỉ" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="follower_count" class="form-label">Số lượng người theo dõi hiện
                                            tại</label>
                                        <input type="number" class="form-control" id="follower_count"
                                               name="follower_count" placeholder="Nhập số lượng người theo dõi hiện tại"
                                               required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="Nhập mật khẩu" required>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                                    </div>

                                    <div class="text-center mt-3">
                                        <a href="#">Đã có tài khoản? Đăng nhập ngay</a>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End Register Section -->

    </main><!-- End #main -->
@endsection
