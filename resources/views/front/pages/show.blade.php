@extends('layouts.front')
@section('content')
    <section>
        <div class="hero-alt relative">
           {{-- <img src="{{ $page->imageUrl }}" alt=""> --}}
           <img src="{{ asset('assets/front/img/hero.jpg') }}">

            <div class="breadcrumb absolute pb-4 pt-10">
                <div class="container">
                    <h1 class="text-white text-vw-lg font-bold">{{ $page->name }}</h1>
                    <ul class="flex items-center text-white">
                        <li class="mr-4 flex items-center">
                            <a href="{{ url('/') }}" class="mr-2">Home</a>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </li>
                        <li class="font-bold">
                            {{ $page->name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-gray py-10">
        <div class="container">
            <div class="grid lg:grid-cols-3 xl:grid-cols-7 gap-10">
                <div class="lg:col-span-2 xl:col-span-10 bg-white px-10 py-20 shadow-md">
                    <div class="article">
                        <?= $page->description ?? ''; ?>
                    </div>
                </div>
                <div class="xl:col-span-2">
                    @include('front.elements.page_sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
