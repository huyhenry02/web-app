@extends('customer.layouts.main')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/customer/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Đăng nhập</h2>
                <ol>
                    <li><a href="#">Trang chủ</a></li>
                    <li>Đăng nhập</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Our Projects Section ======= -->
        <section id="login" class="login section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">

                        <div class="card shadow-sm">
                            <div class="card-body p-5">

                                <h4 class="card-title text-center mb-4">Đăng nhập vào tài khoản của bạn</h4>

                                <form action="{{ route('post_login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label" for="remember">Nhớ tài khoản</label>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

    </main><!-- End #main -->
@endsection
