@php use App\Models\Campaign; @endphp
@extends('customer.layouts.main')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/customer/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Chiến dịch đã tham gia</h2>
                <ol>
                    <li><a href="#">Trang chủ</a></li>
                    <li>Chiến dịch</li>
                </ol>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Campaigns Section ======= -->
        <section id="campaigns" class="campaigns section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-12">

                        <!-- Campaigns List -->
                        <div class="card shadow-sm mb-5">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Danh sách chiến dịch đã tham gia</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped align-middle">
                                        <thead class="table-light">
                                        <tr>
                                            <th scope="col">Mã chiến dịch</th>
                                            <th scope="col">Tên chiến dịch</th>
                                            <th scope="col">Ngày bắt đầu</th>
                                            <th scope="col">Ngày kết thúc</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                        </thead>
                                       @foreach( $listCampaigns as $key => $val )
                                            <tbody>
                                            <tr>
                                                <td>{{ $val->campaign?->code ?? '' }}</td>
                                                <td>{{ $val->campaign?->name ?? '' }}</td>
                                                <td>{{ $val->campaign?->start_date ?? '' }}</td>
                                                <td>{{ $val->campaign?->end_date ?? '' }}</td>
                                                <td>
                                                    @switch( $val->status )
                                                        @case( $val->status === Campaign::STATUS_ACTIVE )
                                                            <span class="badge bg-primary">Đang hoạt động</span>
                                                            @break
                                                        @case( $val->status === Campaign::STATUS_COMPLETED )
                                                            <span class="badge bg-success">Hoàn thành</span>
                                                            @break
                                                        @case( $val->status === Campaign::STATUS_PENDING )
                                                            <span class="badge bg-warning">Chuẩn bị</span>
                                                            @break
                                                    @endswitch
                                                </td>
                                                <td>
                                                    <a href="{{ route('creator.showDetailCampaign', $val->campaign_id) }}" class="btn btn-info btn-sm">Xem chi tiết</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                       @endforeach
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Campaigns List -->

                    </div>
                </div>

            </div>
        </section><!-- End Campaigns Section -->

    </main><!-- End #main -->
@endsection
