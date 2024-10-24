<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center">
            <h1>Campaign Pro<span>.</span></h1>
        </a>
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('creator.index') }}" class="active">Trang chủ</a></li>
                <li><a href="{{ route('creator.showListCampaign') }}">Chiến dịch</a></li>
                <li><a href="{{ route('creator.showContact') }}">Liên lạc</a></li>
            </ul>
        </nav><!-- .navbar -->

        @if( auth()->check() )
                    <!-- User Menu -->
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-2"> {{ auth()->user()->name }}</span>
                            <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('creator.showYourCampaign') }}"> Chiến dịch của bạn </a></li>
                            <li><a class="dropdown-item" href="{{ route('creator.showRequestCampaign') }}"> Yêu cầu của bạn </a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"> Đăng xuất </a></li>
                        </ul>
                    </div>
                    <!-- End User Menu -->
        @else
            <div class="user-links d-flex align-items-center">
                <a href="{{ route('show_register') }}" class="me-2">Đăng ký</a>
                <span>/</span>
                <a href="{{ route('show_login') }}" class="ms-2">Đăng nhập</a>
            </div>
        @endif
    </div>
</header><!-- End Header -->
