@extends('customer.layouts.main')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 data-aos="fade-down">Chào mừng đến với <span>ECOMOBI</span></h2>
                        <p data-aos="fade-up">Chúng tôi là một tổ chức xã hội không ngừng nỗ lực thực hiện những chiến dịch ý nghĩa, nhằm đem lại tác động tích cực cho cộng đồng.
                            Với sứ mệnh kết nối những người có chung nhiệt huyết, chúng tôi mong muốn bạn cùng chung tay, góp sức trong các hoạt động của mình.
                            Hãy khám phá các chiến dịch hiện có và cùng chúng tôi xây dựng một xã hội tốt đẹp hơn.</p>
                    </div>
                </div>
            </div>
        </div>


        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active" style="background-image: url(/customer/img/hero-carousel/background1.jpg)">
            </div>
            <div class="carousel-item" style="background-image: url(/customer/img/hero-carousel/background2.jpg)"></div>
            <div class="carousel-item" style="background-image: url(/customer/img/hero-carousel/background3.jpg)"></div>
            <div class="carousel-item" style="background-image: url(/customer/img/hero-carousel/background4.jpg)"></div>
            <div class="carousel-item" style="background-image: url(/customer/img/hero-carousel/background5.jpg)"></div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

    </section><!-- End Hero Section -->

    <main id="main">
        <!-- ======= Constructions Section ======= -->
        <section id="constructions" class="constructions">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Chiến Dịch Nổi Bật</h2>
                    <p>Khám phá những chiến dịch ý nghĩa mà chúng tôi đã và đang thực hiện nhằm tạo ra những thay đổi tích cực cho cộng đồng.</p>
                </div>

                <div class="row gy-4">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-item">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="card-bg"
                                         style="background-image: url(/customer/img/edit-project-erp.jpg);"></div>
                                </div>
                                <div class="col-xl-7 d-flex align-items-center">
                                    <div class="card-body">
                                        <div class="card-body">
                                            <h4 class="card-title">Chiến Dịch Giáo Dục Cho Trẻ Em</h4>
                                            <p>Chúng tôi đã tổ chức các lớp học miễn phí cho trẻ em tại các vùng sâu, vùng xa nhằm nâng cao chất lượng giáo dục và mở ra những cơ hội học tập mới cho các em.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-item">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="card-bg"
                                         style="background-image: url(/customer/img/edit-project-hospital.jpg);"></div>
                                </div>
                                <div class="col-xl-7 d-flex align-items-center">
                                    <div class="card-body">
                                        <h4 class="card-title">Chiến Dịch Y Tế Cộng Đồng</h4>
                                        <p>Chúng tôi cung cấp dịch vụ y tế miễn phí và tổ chức các buổi khám sức khỏe định kỳ cho những người có hoàn cảnh khó khăn tại nhiều khu vực.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-item">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="card-bg"
                                         style="background-image: url(/customer/img/edit-project-sales.jpg);"></div>
                                </div>
                                <div class="col-xl-7 d-flex align-items-center">
                                    <div class="card-body">
                                        <h4 class="card-title">Chiến Dịch Bảo Vệ Môi Trường</h4>
                                        <p>Chúng tôi đã thực hiện nhiều hoạt động như trồng cây xanh, dọn dẹp rác thải và nâng cao nhận thức về bảo vệ môi trường cho cộng đồng địa phương.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="card-item">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="card-bg"
                                         style="background-image: url(/customer/img/edit-project-security.jpg);"></div>
                                </div>
                                <div class="col-xl-7 d-flex align-items-center">
                                    <div class="card-body">
                                        <h4 class="card-title">Chiến Dịch Hỗ Trợ Người Vô Gia Cư</h4>
                                        <p>Chúng tôi cung cấp chỗ ở tạm thời, thực phẩm và các dịch vụ hỗ trợ khác cho người vô gia cư, giúp họ có cơ hội tái hòa nhập cộng đồng.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Card Item -->

                </div>

            </div>
        </section><!-- End Constructions Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Chúng Tôi Là Ai</h2>
                    <p>Tổ chức của chúng tôi cam kết mang lại tác động xã hội tích cực thông qua các chiến dịch, sự kiện và hoạt động cộng đồng, nhằm thay đổi và phát triển bền vững.</p>
                </div>

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item service-1 position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-mountain-city"></i>
                            </div>
                            <h3>Kết Nối Cộng Đồng</h3>
                            <p>Chúng tôi xây dựng các chiến dịch tạo cơ hội kết nối mọi người với nhau, thúc đẩy tinh thần đoàn kết và sẻ chia trong xã hội.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item service-2 position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-arrow-up-from-ground-water"></i>
                            </div>
                            <h3>Phát Triển Bền Vững</h3>
                            <p>Chúng tôi không chỉ tập trung vào kết quả ngắn hạn mà còn hướng đến sự phát triển bền vững, hỗ trợ cộng đồng xây dựng tương lai vững chắc.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item service-3 position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-compass-drafting"></i>
                            </div>
                            <h3>Hoạt Động Tình Nguyện</h3>
                            <p>Chúng tôi tổ chức các hoạt động tình nguyện nhằm nâng cao ý thức cộng đồng, mang lại giá trị thực sự và tạo nên sự khác biệt.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item service-4 position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-trowel-bricks"></i>
                            </div>
                            <h3>Bảo Vệ Môi Trường</h3>
                            <p>Các chương trình của chúng tôi tập trung vào việc bảo vệ môi trường và khuyến khích mọi người cùng hành động vì một thế giới xanh, sạch, đẹp.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item service-5 position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-helmet-safety"></i>
                            </div>
                            <h3>Giáo Dục và Đào Tạo</h3>
                            <p>Chúng tôi tổ chức các chương trình giáo dục nhằm cung cấp kiến thức, kỹ năng cho cộng đồng, giúp nâng cao nhận thức và tạo ra sự thay đổi tích cực.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item service-6 position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-arrow-up-from-ground-water"></i>
                            </div>
                            <h3>Hợp Tác Chiến Lược</h3>
                            <p>Chúng tôi xây dựng các mối quan hệ hợp tác chiến lược với các tổ chức và doanh nghiệp để cùng nhau thực hiện các mục tiêu xã hội chung.</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">
            <div class="container" data-aos="fade-up">


                <div class="section-header">
                    <h2>Các Hoạt Động Cộng Đồng Gần Đây</h2>
                    <p>Cập Nhật Những Câu Chuyện, Hoạt Động Và Dự Án Của Chúng Tôi Vì Cộng Đồng Và Sự Phát Triển Bền Vững</p>
                </div>

                <div class="row gy-5">

                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="post-item position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt="">
                                <span class="post-date">3 Tháng 6</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Chương Trình Tình Nguyện Viên Tại Vùng Cao: Mang Niềm Vui Đến Những Em Nhỏ</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">Nguyễn Văn An<</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Tình Nguyện </span>
                                    </div>
                                </div>

                                <hr>

                                <a href="#" class="readmore stretched-link"><span>Chi tiết</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div><!-- End post item -->

                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="post-item position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="assets/img/blog/blog-2.jpg" class="img-fluid" alt="">
                                <span class="post-date">4 Tháng 5</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Dự Án "Xanh Hơn Mỗi Ngày": Hành Động Vì Môi Trường Xanh Cho Trái Đất</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">Nguyễn Văn B</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Môi Trường</span>
                                    </div>
                                </div>

                                <hr>

                                <a href="#" class="readmore stretched-link"><span>Chi tiết</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div><!-- End post item -->

                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="300">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="assets/img/blog/blog-3.jpg" class="img-fluid" alt="">
                                <span class="post-date">7 Tháng 9</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Kết Nối Và Xây Dựng Cộng Đồng: Tạo Nên Sự Khác Biệt Qua Những Dự Án Nhỏ</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">Nguyễn Văn C</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Cộng Đồng</span>
                                    </div>
                                </div>

                                <hr>

                                <a href="#" class="readmore stretched-link"><span>Chi tiết</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div><!-- End post item -->

                </div>

            </div>
        </section>
        <!-- End Recent Blog Posts Section -->

    </main><!-- End #main -->

@endsection
