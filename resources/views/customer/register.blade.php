@extends('customer.layouts.main')
@section('content')
    <!-- Heading -->
    <div id="heading">
        <h1>Đăng ký</h1>
    </div>

    <!-- Main -->
    <section id="main" class="wrapper">
        <!-- Registration Form -->
        <div class="inner">
            <div class="content">
                <h2>Đăng Ký Tài Khoản</h2>
                <form action="#" method="POST">
                    <div class="fields">
                        <div class="field half">
                            <label for="first_name">Tên</label>
                            <input type="text" name="first_name" id="first_name" placeholder="Nhập tên của bạn" required/>
                        </div>
                        <div class="field half">
                            <label for="last_name">Họ</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Nhập họ của bạn" required/>
                        </div>
                        <div class="field">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Nhập email của bạn" required/>
                        </div>
                        <div class="field">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" name="username" id="username" placeholder="Nhập tên đăng nhập" required/>
                        </div>
                        <div class="field half">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" placeholder="Tạo mật khẩu" required/>
                        </div>
                        <div class="field half">
                            <label for="confirm_password">Xác nhận mật khẩu</label>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Xác nhận mật khẩu"
                                   required/>
                        </div>
                    </div>
                    <div class="field">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms" style="margin-top: 15px">Tôi đồng ý với <a href="#">Điều khoản dịch vụ</a> và <a href="#">Chính sách bảo
                                mật</a>.</label>
                    </div>
                    <ul class="actions">
                        <li><input type="submit" value="Đăng Ký" class="primary"/></li>
                        <li><input type="reset" value="Xóa"/></li>
                    </ul>
                </form>
            </div>
        </div>

    </section>
    <style>
        #register .inner {
            max-width: 600px;
            margin: 0 auto;
            padding: 2em;
            background: #f9f9f9;
            border-radius: 10px;
        }

        #register h2 {
            text-align: center;
            margin-bottom: 1em;
        }

        #register .fields {
            display: flex;
            flex-wrap: wrap;
            gap: 1em;
        }

        #register .field.half {
            flex: 1 1 calc(50% - 1em);
            margin-top: 5px;
        }

        #register .actions {
            display: flex;
            justify-content: center;
            gap: 1em;
        }

        #register .actions .primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 0.75em 1.5em;
            border-radius: 5px;
            cursor: pointer;
        }

    </style>
@endsection
