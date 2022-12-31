@extends('layouts.front_video_gallery')
@push('styles')
<style>
    .video-list {
        list-style-type: none;
    }

    .video-list li {
        display: inline-block;
    }
</style>
@endpush
@section('content')
<!-- Hero -->
<section class="hero hero-alt relative">
    <img src="{{ asset('assets/front/img/hero.jpg') }}" alt="">
    <div class="overlay absolute">
        <div class="container ">
            <h1>Video Gallery</h1>
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
<section style="background: #124b80;border-bottom: 3px solid #74818e;">
    <div class="py-20">
        <div class="container">
            <div class="flex justify-between flex-wrap">
                <h2 class="text-center text-white mb-8 font-display text-4xl">Video Gallery </span></h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-10">
                @forelse ($videos as $video)
                    <div class="relative">
                        <img src="{{ $video->embed_img }}" alt="">
                        <a data-fancybox href="https://youtu.be/{{ $video->embed_code }}" class="absolute place-center text-white">
                            <div class="bg-primary rounded-full">
                                <svg class="block w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5"
                                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</section>{{-- Videos --}}
@endsection
