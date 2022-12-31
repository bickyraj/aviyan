@extends('layouts.front')
@section('content')
<!-- Hero -->
<section class="hero hero-alt relative">
    <img src="{{ asset('assets/front/img/hero.jpg') }}" alt="">
    <div class="overlay absolute">
        <div class="container ">
            <h1>Notice / News</h1>
            <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb fs-sm wrap">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Notice / News</li>
                    </ol>
                </nav>
            </div>
        </div>
</section>

<section class="news py-5 mt-10">
    <div class="container">
        <div class="grid lg:grid-cols-3 gap-2 xl:gap-3">
            @forelse ($events as $event)
                <a href="{{ route('front.news.show', ['slug' => $event->slug]) }}">
                    <div class="article">
                        <div class="image">
                            <img src="{{ $event->imageUrl }}" alt="">
                        </div>
                        <div class="content">
                            <div class="flex mb-2 text-sm text-gray">
                <svg class="mr-2 w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ $event->formattedDate }}
            </div>
                            <h2>{{ $event->name }}</h2>
                            <p class="fs-sm">{{ truncate(strip_tags($event->description)) }}</p>
                        </div>
                    </div>
                </a>
            @empty
            @endforelse
        </div>
        {{-- <a href="#" class="theme">Go to Events
            <svg><use xlink:href="{{ asset('assets/front/img/sprite.svg#arrownarrowright') }}" /></svg>
        </a> --}}
    </div>
</section>
@endsection
