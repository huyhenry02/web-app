@extends('customer.layouts.main')
@section('content')
    <!-- Heading -->
    <div id="heading">
        <h1>Chiến Dịch</h1>
    </div>

    <!-- Main Section -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <div class="campaign-list">
                    @foreach($campaigns as $campaign)
                        <article class="campaign-item">
                            <h3>{{ $campaign->name ?? '' }}</h3>
                            <p>{{ $campaign->description ?? '' }}</p>
                            <a href="{{ route('creator.showDetailCampaign', $campaign->id) }}" class="campaign-link">Xem Chi Tiết</a>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <style>
        .campaign-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2em;
            margin-top: 2em;
        }

        .campaign-item {
            padding: 1.5em;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            position: relative;
            border: 1px solid #ddd;
            transition: transform 0.3s ease;
        }

        .campaign-item:hover {
            transform: translateY(-8px);
        }

        .campaign-item h3 {
            text-align: center;
            font-size: 1.5em;
            color: #333;
            margin-bottom: 0.5em;
            font-weight: bold;
        }

        .campaign-item p {
            color: #666;
            margin: 0.5em 0 2em;
            height: 180px;
        }

        .campaign-link {
            position: absolute;
            right: 1.5em;
            bottom: 1.5em;
            background-color: #ff6b6b;
            color: #fff;
            padding: 0.5em 1em;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .campaign-link:hover {
            background-color: #ff4d4d;
        }

    </style>
@endsection
