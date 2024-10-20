@extends('customer.layouts.main')
@section('content')
    <!-- Heading -->
    <div id="heading">
        <h1>Thông tin chi tiết</h1>
    </div>

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content campaign-details">

                <!-- Campaign Banner -->
                <div class="campaign-banner">
                    <img src="customer/images/banner.jpg" alt="Banner Chiến dịch bảo vệ rừng">
                </div>

                <!-- Campaign Information -->
                <div class="campaign-info">
                    <h2 class="campaign-name">Chiến dịch bảo vệ rừng</h2>
                    <div class="campaign-meta">
                        <p class="campaign-code"><strong>Mã chiến dịch:</strong> #12345</p>
                        <p class="campaign-dates">
                            <strong>Ngày bắt đầu:</strong> 01/01/2024 <br>
                            <strong>Ngày kết thúc:</strong> 31/12/2024
                        </p>
                        <p class="campaign-followers"><strong>Lượng người theo dõi yêu cầu:</strong> 10,000</p>
                    </div>

                    <div class="campaign-description">
                        <h3>Mô tả Chiến dịch</h3>
                        <p>
                            Chiến dịch bảo vệ rừng nhằm chống lại nạn phá rừng và khai thác tài nguyên một cách trái phép. Chúng tôi kêu gọi các cá nhân và tổ chức tham gia cùng chúng tôi trong sứ mệnh này để bảo vệ tài nguyên thiên nhiên. Mỗi người đóng góp không chỉ giúp bảo tồn môi trường sống của các loài động thực vật quý hiếm, mà còn góp phần giữ gìn sự đa dạng sinh học và giảm thiểu các tác động tiêu cực của biến đổi khí hậu...
                        </p>
                        <p>
                            ...Bạn có thể tham gia bằng cách đăng ký làm tình nguyện viên, ủng hộ tài chính, hoặc chia sẻ thông tin chiến dịch đến với nhiều người hơn. Hãy cùng chúng tôi bảo vệ những khu rừng xanh, ngôi nhà của hàng nghìn loài sinh vật và nguồn sống cho thế hệ tương lai.
                        </p>
                    </div>
                    <button type="button" class="btn btn-custom float-end mt-4" data-bs-toggle="modal" data-bs-target="#joinModal">
                        Tham gia
                    </button>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="joinModal" tabindex="-1" aria-labelledby="joinModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="joinModalLabel">Lý do bạn muốn tham gia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Lý do tham gia</label>
                            <textarea class="form-control" id="reason" rows="3" placeholder="Nhập lý do của bạn..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        .campaign-details {
            padding: 3em;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border: 1px solid #ddd;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .campaign-banner img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 2em;
        }

        .campaign-info {
            text-align: left;
            width: 100%;
        }

        .campaign-name {
            font-size: 2.5em;
            color: #333;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1em;
        }

        .campaign-meta {
            display: flex;
            justify-content: space-around;
            background-color: #f9f9f9;
            padding: 1.5em;
            border-radius: 10px;
            margin-bottom: 2em;
        }

        .campaign-meta p {
            font-size: 1.1em;
            color: #555;
        }

        .campaign-description {
            text-align: justify;
            font-size: 1em;
            color: #666;
            line-height: 1.8;
        }

        .campaign-description h3 {
            font-size: 1.5em;
            margin-bottom: 1em;
            color: #333;
        }

    </style>
@endsection
