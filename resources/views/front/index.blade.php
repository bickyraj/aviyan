@extends('layouts.front')
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tiny-slider@2.9.3/dist/tiny-slider.css">
@endpush

@section('content')
    {{-- Hero --}}
    @include('front.elements.banner')
    {{-- Hero --}}

    {{-- News --}}
    @if(iterator_count($news))
    <section>
        <div class="bg-primary py-10 xl:py-20">
            <div class="container">
                <h2 class="text-center text-white mb-8 font-display text-4xl">Latest News</span></h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($news as $news_item)
                        @include('front.elements.news_card', ['event' => $news_item])
                    @endforeach
                </div>
                <div class="text-center" style="padding-top: 30px;"><a href="{{ url('/news') }}" class="btn btn-accent">read all</a></div>
            </div>
        </div>
    </section>{{-- News --}}
    @endif

    {{-- About and Message --}}
    <section class="bg-gray">
        <div class="container py-10">
            <div class="grid lg:grid-cols-1 gap-10 items-center">
                <div class="text-center">
                    <h2 class="mb-8 font-display text-4xl">About <span class="text-primary">Aviyan Group</span></h2>
                    <p class="mb-4"> <?= Setting::get('homePage')['welcome']['content'] ?></p>
                    <div><a href="{{ url('/about-us') }}" class="btn btn-primary">Read More</a></div>
                </div>
               
            </div>
        </div>
    </section>{{-- About and Message --}}

{{-- Photos --}}
<section>
    <div class="bg-white py-20">
        <div class="container">

            <h2 class="text-center text-black mb-8 font-display text-4xl">Gallery</span></h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                @if (!empty($galleries))
                    @foreach ($galleries as $gallery)
                    <div>
                        <a data-fancybox="gallery" href="{{ $gallery->imageUrl }}" class="w-full" >
                            <div class="w-full" style="padding-top:80%;background:center / cover url('{{ $gallery->imageUrl }}')">
                            </div>
                            {{-- <img src="{{ $url }}" alt="" class="block"> --}}
                        </a>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="text-center" style="padding-top: 30px;"><a href="#" class="btn btn-accent">See all</a></div>
    </div>
    
</section>{{-- Photos --}}

    {{-- Blog --}}
    @if(iterator_count($blogs))
        <section>
            <div class="bg-gray pt-10 pb-10 xl:pt-20">
                <div class="container">

                    <div class="flex justify-between flex-wrap">
                        <h2 class="text-center font-display text-4xl">From <span class="text-primary">Our Blog</span></span></h2>
                        <div>
                            <a href="{{ url('/blogs') }}" class="btn btn-primary">Go to Blog</a>
                        </div>
                    </div>
                      <div class="grid lg:grid-cols-3 gap-2 xl:gap-3">
                        @forelse ($blogs as $blog)
                            <a href="{{ route('front.blogs.show', ['slug' => $blog->slug]) }}">
                                <div class="article">
                                    <div class="image">
                                        <img src="{{ $blog->imageUrl }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h2>{{ $blog->name }}</h2>
                                    </div>
                                </div>
                            </a>
                        @empty
            @endforelse
        </div>
                </div>
            </div>
        </section>
    @endif
    {{-- Blog --}}
@endsection
@push('scripts')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script>
        var elem = document.querySelector('.masonry');
        var msnry = new Masonry( elem, {
        // options
        itemSelector: '.masonry > div',
        // columnWidth: 200
        percentPosition: true
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/tiny-slider@2.9.3/dist/tiny-slider.min.js"></script>

    <script>
        const heroSlider = tns({
            container: '.hero-slider',
            nav: false,
            controlsContainer: '.hero-slider-controls > div',
            autoplay: true,
            autoplayButtonOutput: false
        })
    </script>
@endpush
