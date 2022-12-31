@extends('layouts.front')
@section('content')
<!-- Hero -->
<section class="hero hero-alt relative">
    <img src="{{ asset('assets/front/img/hero.jpg') }}" alt="">
    <div class="overlay absolute">
        <div class="container ">
            <h1>Blog</h1>
            <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb fs-sm wrap">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
</section>

<section class="news py-5">
    <div class="container">

        <div class="grid lg:grid-cols-3 gap-2 xl:gap-3">
            @forelse ($blogs as $blog)
                <a href="{{ route('front.blogs.show', ['slug' => $blog->slug]) }}">
                    <div class="article">
                        <div class="image">
                            <img src="{{ $blog->imageUrl }}" alt="">
                        </div>
                        <div class="content">
                            <div class="flex mb-2 text-sm">
                    <svg class="mr-2 w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ $blog->formattedDate }}
                </div>
                            <h2>{{ $blog->name }}</h2>
                            <p class="fs-sm">{{ truncate(strip_tags($blog->description)) }}</p>
                        </div>
                    </div>
                </a>
            @empty
            @endforelse
        </div>
        <!--<a href="#" class="theme">Go to blog-->
        <!--    <svg><use xlink:href="{{ asset('assets/front/img/sprite.svg#arrownarrowright') }}" /></svg>-->
        <!--</a>-->
    </div>
</section>
@endsection
