@extends('customer.layouts.main')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
             style="background-image: url('/customer/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>{{ $model -> name }}</h2>
                <ol>
                    <li><a href="#">Trang chủ</a></li>
                    <li>Chiến dịch</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Service Details Section ======= -->
        <section id="service-details" class="service-details">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="services-list">
                            <a href="#"><b>Mã:</b> {{ $model->code ?? ''}}</a>
                            <a href="#"><b>Thời gian bắt đầu:</b> {{ $model->start_date ?? ''}}</a>
                            <a href="#"><b>Thời gian kết thúc:</b> {{ $model->end_date ?? ''}}</a>
                            <a href="#"><b>Lượng người theo dõi yêu cầu:</b> {{ $model->follower_required ?? ''}}</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#confirmParticipationModal">
                                Xác nhận tham gia
                            </button>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <img src="{{ $model->banner }}" alt="" class="img-fluid services-img" width="1024" height="768">
                        <p>
                            {{ $model->description ?? ''}}
                        </p>
                        <p>
                            {{ $model->description ?? ''}}
                        </p>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Service Details Section -->

    </main><!-- End #main -->]
    <div class="modal fade" id="confirmParticipationModal" tabindex="-1" aria-labelledby="confirmParticipationLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmParticipationLabel">Xác nhận tham gia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn tham gia chiến dịch này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <form action="" method="POST">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
