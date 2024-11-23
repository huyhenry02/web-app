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
                            <a href="#"><b>Hoa hồng nhận
                                    được:</b> {{ isset($model->commission) ? number_format($model->commission, 0, ',', '.') . ' VND' : '' }}
                            </a>
                            <a href="#"><b>Nhãn hàng:</b> {{ $model->brand ?? ''}}</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            @if(!empty($checkJoin))
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#outParticipationModal">
                                    Yêu cầu rời khỏi
                                </button>

                            @else
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#confirmParticipationModal">
                                    Yêu cầu tham gia
                                </button>
                            @endif
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="confirmParticipationLabel">Xác nhận tham gia</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted"> Bạn có chắc chắn muốn tham gia chiến dịch này không?</p>
                    <form action="{{ route('creator.sendRequest') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="campaign_id" value="{{ $model->id }}">
                        <input type="hidden" name="type" value="request_join">
                        <div class="mb-3">
                            <textarea name="note" class="form-control" rows="4"
                                      placeholder="Nhập lời nhắn của bạn..."></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="outParticipationModal" tabindex="-1" aria-labelledby="outParticipationLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="outParticipationLabel">Xác nhận rời khỏi chiến dịch</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">Bạn có chắc chắn muốn rời chiến dịch này không? Hãy nhập lời nhắn của bạn để
                        chúng tôi có thể hiểu lý do.</p>
                    <form action="{{ route('creator.sendRequest') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="campaign_id" value="{{ $model->id }}">
                        <input type="hidden" name="type" value="request_out">
                        <div class="mb-3">
                            <textarea name="note" class="form-control" rows="4"
                                      placeholder="Nhập lời nhắn của bạn..."></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
