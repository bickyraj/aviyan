@extends('layouts.front')
@push('styles')
<style>
    .page-list {
        list-style-type: none;
        margin-top: 20px;
        padding-left: 20px;
    }

    .page-list p {
        line-height: 20px;
        margin-top: 14px;
        font-size: 14px;
    }

    .page-list li {
        list-style-type: disclosure-closed;
    }

    .page-list li>a {
        color: rgb(18 80 135);
        font-weight: bold;
    }

    .page-list li>a:hover {
        color: #ff6913;
    }
</style>
@endpush
@section('content')
    <section>
        <div class="hero-alt relative">
            <img src="{{ asset('assets/front/img/bg1.jpg') }}" alt="">
            <div class="text absolute flex items-center">
                <div class="container">
                    <h1 class="text-white text-vw-lg font-bold">Pages</h1>
                    {{-- <div class="text-white text-xl">Saving Lives since 1973 AD</div> --}}
                </div>
            </div>
            <div class="breadcrumb absolute pb-4 pt-10">
                <div class="container">
                    <ul class="flex items-center text-white">
                        <li class="mr-4 flex items-center">
                            <a href="{{ url('/') }}" class="mr-2">Home</a>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </li>
                        <li class="font-bold">
                            Search
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-gray py-10">
        <div class="container">
            <div class="grid lg:grid-cols-3 xl:grid-cols-7 gap-10">
                <div class="lg:col-span-2 xl:col-span-5 bg-white px-10 py-20 shadow-md">
                    <div class="">
                        <h3>Search result for "{{ request()->get('keyword') }}"</h3>
                        <ul class="page-list">
                            @forelse ($pages as $page)
                                <li>
                                    <a href="{{ $page->link }}">{{ $page->name }}</a>
                                    <p>
                                        {{ truncate(removeStyleTags($page->description)) }}
                                    </p>
                                </li>
                            @empty
                                No result found.
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="xl:col-span-2">
                    @include('front.elements.page_sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
