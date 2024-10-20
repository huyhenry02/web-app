@extends('customer.layouts.main')
@section('content')
    <div id="heading">
        <h1>Đăng nhập</h1>
    </div>

    <!-- Main -->
    <section id="main" class="wrapper">
        <!-- Registration Form -->
        <div class="inner">
            <div class="content">
                <h2>Đăng nhập hệ thống</h2>
                <form action="#" method="POST">
                    <div class="fields">
                        <div class="field">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Nhập email của bạn" required/>
                        </div>

                        <div class="field half">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" placeholder="Mật khẩu" required/>
                        </div>
                    </div>
                    <ul class="actions" style="margin-top: 10px">
                        <li><input type="submit" value="Đăng nhập" class="primary"/></li>
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
