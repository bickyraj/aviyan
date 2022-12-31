@extends('layouts.front_inner')
@push('styles')
@endpush
@section('content')
    <section>
        <div class="hero-alt relative">
            <img src="{{ asset('assets/front/img/bg1.jpg') }}" alt="">
            <div class="text absolute flex items-center">
                <div class="container">
                    <h1 class="text-white text-vw-lg font-bold">Board Members</h1>
                </div>
            </div>
            <div class="breadcrumb absolute pb-4 pt-10">
                <div class="container">
                    <ul class="flex items-center text-white">
                        <li class="mr-4 flex items-center">
                            <a href="{{ route('home') }}" class="mr-2">Home</a>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </li>
                        <li class="font-bold">
                            Board Members
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray">
        <div class="container py-10">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @for ($i = 0; $i < 18; $i++)
                <div class="bg-white shadow-md p-4">
                    <div class="mb-4 text-center">
                        {{-- <img src="{{ asset('img/chairman.jpg')}}" alt="" width="200"> --}}
                        <img src="https://placeimg.com/200/240/people/{{ $i }}" alt="" width="160">
                    </div>
                    <h2 class="mb-1 font-display text-primary text-center text-2xl">Roberta Bartell</h2>
                    <div class="text-center mb-8">Chairperson</div>
                    <ul class="mb-4">
                        <li class="flex  mb-2">
                            <svg class="flex-shrink-0 w-4 h-4 mr-1 text-primary">
                                <use xlink:href="{{ asset('img/sprite.svg') }}#phone" /></svg>
                            <a href="tel:+977-01-4400000">+977-01-000000</a>
                        </li>
                        <li class="flex  mb-2">
                            <svg class="flex-shrink-0 w-4 h-4 mr-1 text-primary">
                                <use xlink:href="{{ asset('img/sprite.svg') }}#phone" /></svg>
                            <div>
                                <div class="mb-1 text-xs text-gray italic">Emergency contact</div>
                                <a href="tel:+977-01-4440292">+977-01-xxxxxx</a>
                            </div>
                        </li>
                        <li class="flex  mb-2">
                            <svg class="flex-shrink-0 w-4 h-4 mr-1 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            <a href="tel:+977-98510000">+977-98510000</a>
                        </li>
                        <li class="flex  mb-2">
                            <svg class="flex-shrink-0 w-4 h-4 mr-1 text-primary">
                                <use xlink:href="{{ asset('img/sprite.svg') }}#mail" /></svg>
                            <a href="mailto:" class="break-all">info@aviyangroup.com.np</a>
                        </li>
                    </ul>
                </div>
                @endfor
            </div>
        </div>
    </section>
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
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush
