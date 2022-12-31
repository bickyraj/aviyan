@extends('layouts.front_inner')
@section('content')
<!-- Hero -->
<section class="hero hero-alt relative">
    <img src="{{ asset('assets/front/img/hero.jpg') }}" alt="">
    <div class="overlay absolute">
        <div class="container ">
            <h1>{{ $trip->name }} Album</h1>
            <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb fs-sm wrap">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('front.trips.all-gallery') }}">Gallery</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Album</li>
                    </ol>
                </nav>
            </div>
        </div>
</section>

<section class="py-5">
    <div class="container">

        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-1">
            @forelse($trip->trip_galleries as $gallery)
            <div class="thumb">
                <a class="fancybox relative" data-fancybox="gallery" href="{{ $gallery->imageUrl }}" data-caption="{{ $gallery->name }}">
                    <img src="{{ $gallery->mediumImageUrl }}" alt="" />
                    <div class="overlay absolute">
                        <svg class="absolute icon-md text-white">
                        <use xlink:href="img/sprite.svg#zoomin" /></svg>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
              <p>No gallery to show.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="{{ asset('assets/front/js/album.js') }}"></script>
@endpush
