<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="#" class="text-nowrap logo-img">
                <img src="/assets/images/logos/logo-v2.png" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Quản lý chiến dịch</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.campaign.list') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-list-details"></i>
                    </span>
                        <span class="hide-menu">Danh sách chiến dịch</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.campaign.request') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-alert-circle"></i>
                    </span>
                        <span class="hide-menu">Yêu cầu phê duyệt</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Quản lý Creator</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.creator.list') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-users"></i>
                    </span>
                        <span class="hide-menu">Danh sách Creator</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.creator.blacklist') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-user-off"></i>
                    </span>
                        <span class="hide-menu">Danh sách đen</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
