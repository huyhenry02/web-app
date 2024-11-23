@extends('customer.layouts.main')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
             style="background-image: url('/customer/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Chiến dịch</h2>
                <ol>
                    <li><a href="#">Trang chủ</a></li>
                    <li>Chiến dịch</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->
        <section class="chart-section container mt-5">
            <h3 class="text-center mb-4">Số lượng Chiến dịch và Người tham gia theo từng năm</h3>
            <canvas id="projectsChart" class="w-100"></canvas>
        </section>

        <!-- ======= Our Projects Section ======= -->
        <section id="projects" class="projects">
            <div class="container" data-aos="fade-up">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm chiến dịch...">
                    </div>
                    <div class="col-md-6 text-md-end">
                        <select id="sortSelect" class="form-select w-auto d-inline-block">
                            <option value="default">Sắp xếp</option>
                            <option value="asc">Hoa hồng tăng dần</option>
                            <option value="desc">Hoa hồng giảm dần</option>
                        </select>
                    </div>
                </div>
                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                     data-portfolio-sort="original-order">

                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                        @foreach( $campaigns as $campaign)
                            <div class="col-lg-4 col-md-6 portfolio-item">
                                <div class="portfolio-content h-100">
                                    <img src="{{ $campaign->banner }}" class="img-fluid" alt="" width="1024px" height="768px">
                                    <div class="portfolio-info">
                                        <h4>{{ $campaign -> code ?? '' }}</h4>
                                        <p>{{ $campaign -> name ?? '' }}</p>
                                        <!-- Thay icon phóng to bằng liên kết xem chi tiết -->
                                        <a href="{{ route('creator.showDetailCampaign', $campaign->id) }}"
                                           title="Xem chi tiết chiến dịch" class="preview-link align-items-center" style="margin-left: 25px;">
                                            <i class="bi bi-eye" ></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div><!-- End Projects Container -->


                </div>

            </div>
        </section><!-- End Our Projects Section -->

    </main><!-- End #main -->
    <style>
        .chart-section {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .chart-section h3 {
            font-weight: 600;
            color: #343a40;
        }

        canvas {
            max-height: 400px;
        }

    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const sortSelect = document.getElementById('sortSelect');
            const campaignContainer = document.querySelector('.portfolio-container');

            function fetchCampaigns() {
                const query = searchInput.value;
                const sort = sortSelect.value;

                fetch(`{{ route('campaign.search') }}?query=${query}&sort=${sort}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        campaignContainer.innerHTML = data.html;
                    })
                    .catch(error => console.error('Error:', error));
            }

            searchInput.addEventListener('input', fetchCampaigns);
            sortSelect.addEventListener('change', fetchCampaigns);
        });
        const ctx = document.getElementById('projectsChart').getContext('2d');
        const projectsChart = new Chart(ctx, {
            type: 'bar', // You can also use 'line', 'pie', etc.
            data: {
                labels: ['2018', '2019', '2020', '2021', '2022', '2023'], // Years
                datasets: [
                    {
                        label: 'Số lượng chiến dịch',
                        data: [10, 15, 8, 25, 30, 40], // Projects data
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Số lượng người tham gia',
                        data: [20, 25, 15, 35, 45, 50], // Customers data
                        backgroundColor: 'rgba(255, 99, 132, 0.6)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
