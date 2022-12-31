@extends('layouts.front')
@section('content')
<!-- Hero -->
<section class="hero hero-alt relative">
    <img src="{{ $event->imageUrl }}" alt="">
    <div class="overlay absolute">
        <div class="container ">
            <h1>News</h1>
            <div class="flex mb-2 text-sm text-gray">
                <svg class="mr-2 w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ $event->formattedDate }}
            </div>
            <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb fs-sm wrap">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('front.news.index') }}">News & Events</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $event->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
</section>

<section class="tour-details mb-4">
    <div class="container mt-2">
        <div class="tour-details-section lim">
            <p style="max-width: 100% !important;">
                {!! $event->description !!}
            </p>
        </div>
    </div>

</section>

<!-- Latest News -->
<section class="news mb-5">
    <div class="container">
        <div class="grid lg:grid-cols-3 gap-2 xl:gap-3">
            @forelse ($events as $news)
                <a href="{{ route('front.news.show', ['slug' => $news->slug]) }}">
                    <div class="article">
                        <div class="image">
                            <img src="{{ $news->imageUrl }}" alt="">
                        </div>
                        <div class="content">
                            <h2>{{ $news->name }}</h2>
                            <p class="fs-sm">{{ truncate(strip_tags($news->description)) }}</p>
                        </div>
                    </div>
                </a>
            @empty
            @endforelse
        </div>
    </div>
</section>
@endsection
