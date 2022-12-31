<div class="tour">
    <div class="top">
        <img src="{{ $tour->imageUrl }}" alt="<?= $tour->name; ?>">
        <div class="top__overlay">
            <div class="location">
                <svg>
                    <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#locationmarker" /></svg>
                <span><?= $tour->location; ?></span>
            </div>
            <div class="activity">
                {{ $tour->trip_activity_type }}
            </div>
        </div>
    </div>
    <div class="offer">{{ $tour->best_value }}</div>
    <div class="bottom">

        <!-- <h2>Mardi Himal Trek</h2> -->
        <h2 class="font-display upper fs-xl"><?= $tour['name'] ?></h2>


        <div class="details flex aic jcsb mb-2">
            <div class="flex aic">
                <svg class="icon">
                    <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#calendar" /></svg>
                <div>
                    <span class="fs-lg bold"> <?= $tour->duration; ?> </span> days
                </div>
            </div>
            <div class="divider"></div>
            <div class="flex aic">
                <svg class="icon">
                    <use xlink:href="{{ asset('assets/front/img/sprite.svg#chartbar') }}" /></svg>
                    {{ $tour->difficulty_grade_value }}
            </div>
            <div class="divider"></div>

            <div class="price">
                <div>
                    <span class="from fs-sm">
                        from
                    </span>
                    <span class="old">
                        USD {{ number_format($tour->cost, 2) }}
                    </span>
                </div>
                <div>
                    <span class="fs-sm">
                        USD
                    </span>
                    <span class="fs-xl">
                        @php
                            $price_arr = explode('.', number_format($tour->offer_price, 2));
                        @endphp
                        {{ $price_arr[0] }}
                    </span>
                    <span class="fs-md">
                        .{{ $price_arr[1] }}
                    </span>
                </div>
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('front.trips.show', $tour->slug) }}" class="btn btn-theme">
                Explore
                <svg>
                    <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#arrownarrowright" /></svg>
            </a>
            <a href="{{ route('front.trips.booking', $tour->slug) }}" class="btn btn-primary">Book Now

            </a>
        </div>

        <div class="stars">
            @for($i = 0; $i<$tour->rating; $i++)
                <svg> <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#star" /></svg>
            @endfor
            <span>based on 30 ratings</span>
        </div>
    </div>
</div>
