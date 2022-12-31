<div class="package-card-sm">
    <a href="{{ $addon_trip->link }}" class="stretched-link">
        <div class="img" style="background-image: linear-gradient(rgba(0,0,0,.2), rgba(0,0,0,.2)),url('{{ $trip->thumbImageUrl }}')">
        </div>
        <div class="info">
            <h1 class="title">{{ $trip->name }}</h1>
            <div class="info-bottom">
                <div class="days">{{ $trip->days }} days</div>
                <div class="price"><small>from</small> <br><b>USD {{ number_format($trip->offer_price) }}</b></div>
            </div>
        </div>
    </a>
</div>
