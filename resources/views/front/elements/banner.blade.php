<section>
    <div class="hero">
        <div id="banner-slider" class="hero-slider">
            @forelse ($banners as $banner)
                <div class="slide relative">
                    <img data-img="{{ $banner->imageUrl }}" src="{{ $banner->thumbImageUrl }}" alt="">
                    <div class="text absolute flex items-center">
                        <div class="container">
                            <h1 class="text-white text-vw-lg font-bold">Aviyan
Group</h1>
                            <div class="text-white text-xl">Your Road to Prosperity</div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>

        <div class="hero-slider-controls none lg:block w-full absolute">
            <div class="flex justify-between w-full">
                <button>
                    <svg class="w-6 h-6">
                        <use xlink:href="{{ asset('assets/front/img/sprite.svg#arrownarrowleft') }}" />
                    </svg>
                </button>
                <button>
                    <svg class="w-6 h-6">
                        <use xlink:href="{{ asset('assets/front/img/sprite.svg#arrownarrowright') }}" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script>
    $(function() {
        $("#banner-slider>.slide").each(function(i, v) {
            let img = new Image();
            let image_src = $(v).find('img').data('img');
            img.onload = function() {
                $(v).find('img').attr('src', image_src);
            }
            img.src = image_src;
            if (img.complete) img.onload();
        });
    });
</script>
@endpush
