@foreach( $campaigns as $campaign)
    <div class="col-lg-4 col-md-6 portfolio-item">
        <div class="portfolio-content h-100">
            <img src="{{ $campaign->banner }}" class="img-fluid" alt="" width="1024px" height="768px">
            <div class="portfolio-info">
                <h4>{{ $campaign -> code ?? '' }}</h4>
                <p>{{ $campaign -> name ?? '' }}</p>
                <a href="{{ route('creator.showDetailCampaign', $campaign->id) }}"
                   title="Xem chi tiết chiến dịch" class="preview-link align-items-center" style="margin-left: 25px;">
                    <i class="bi bi-eye" ></i>
                </a>
            </div>
        </div>
    </div>
@endforeach
