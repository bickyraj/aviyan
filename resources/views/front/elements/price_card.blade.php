<div class="price-card">
    <!-- <div class="ribbon">
        <div class="text">
            Best Price
        </div>
    </div> -->

    <div class="p-2 bg-primary text-white ">
        <div class="fs-sm mb-3">Price starting from</div>
        <p class="price">
            <s>${{ number_format($trip->cost) }}</s>
            <span class="currency">USD</span>
            <span class="figure">{{ number_format($trip->offer_price) }}</span>
        </p>
        <p class="mb-3">
            <small>per person</small>
        </p>
        <div>
            <a href="{{ route('front.trips.booking', $trip->slug) }}" class="btn btn-theme">Book Now</a>
        </div>
    </div>
    <div class="flex jcsa p-1 bg-light">
        <a href="tour-details-print.php" class="text-primary hover:text-accent" title=""> <i class="fas fa-print"></i>
            <svg class="icon-md">
                <use xlink:href="{{ asset('assets/front/img/sprite.svg#printer') }}" title="Print tour details" /></svg>
        </a>
        <a href="#" class="text-primary hover:text-accent" title=""><i class="fas fa-map" title=""></i>
            <svg class="icon-md">
                <use xlink:href="{{ asset('assets/front/img/sprite.svg#download') }}" title="Download tour brochure" /></svg>
        </a>
        <a href="#" class="text-primary hover:text-accent" title=""> <i class="fas fa-map" title=""></i>
            <svg class="icon-md">
                <use xlink:href="{{ asset('assets/front/img/sprite.svg#share') }}" title="Share tour" /></svg>
        </a>
    </div>
</div>
