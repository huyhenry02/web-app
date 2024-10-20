@extends('customer.layouts.main')
@section('content')
    <section id="banner">
        <div class="inner">
            <h1>Chào mừng đến Tổ chức </h1>
            <p>Cùng khám phá những chiến dịch nổi bật và góp phần thay đổi thế giới với chúng tôi.</p>
        </div>
        <video autoplay loop muted playsinline src="customer/images/banner.mp4"></video>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <header class="special">
                <h2>Chiến Dịch Nổi Bật</h2>
                <p>Các chiến dịch nổi bật của chúng tôi đang góp phần tạo ra thay đổi tích cực cho cộng đồng.</p>
            </header>
            <div class="highlights">
                <section>
                    <div class="content">
                        <header>
                            <a href="#" class="icon fa-flag"><span class="label">Icon</span></a>
                            <h3>Bảo Vệ Môi Trường</h3>
                        </header>
                        <p>Cùng hành động bảo vệ môi trường, giảm thiểu rác thải và bảo vệ hệ sinh thái tự nhiên.</p>
                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="#" class="icon fa-heart"><span class="label">Icon</span></a>
                            <h3>Hỗ Trợ Trẻ Em</h3>
                        </header>
                        <p>Chúng tôi hỗ trợ trẻ em nghèo, giúp các em có cơ hội tiếp cận với giáo dục và y tế.</p>
                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="#" class="icon fa-handshake-o"><span class="label">Icon</span></a>
                            <h3>Phát Triển Cộng Đồng</h3>
                        </header>
                        <p>Chung tay xây dựng cộng đồng, hỗ trợ người dân trong việc cải thiện chất lượng cuộc sống.</p>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section id="cta" class="wrapper">
        <div class="inner">
            <h2>Tham Gia Cùng Chúng Tôi</h2>
            <p>Tham gia cùng chúng tôi để góp phần tạo ra sự thay đổi tích cực trong cộng đồng. Hãy trở thành một phần của các chiến dịch chúng tôi ngay hôm nay!</p>
        </div>
    </section>

@endsection
