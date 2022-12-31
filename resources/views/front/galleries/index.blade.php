@extends('layouts.front')
@section('content')
<!-- Hero -->
<section class="hero hero-alt relative">
    <img src="{{ asset('assets/front/img/hero.jpg') }}" alt="">
    <div class="overlay absolute">
        <div class="container ">
            <h1>Gallery</h1>
            <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb fs-sm wrap">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
</section>
<section>
    <div class="bg-primary py-20">
        <div class="container">

            <h2 class="text-center text-white mb-8 font-display text-4xl">Gallery</span></h2>
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
    </div>
</section>
@endsection
