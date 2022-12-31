@extends('layouts.front_inner')
@section('content')
<!-- Hero -->
<section class="hero hero-alt relative">
    <img src="{{ asset('assets/front/img/hero.jpg') }}" alt="">
    <div class="overlay absolute">
        <div class="container ">
            <h1>FAQs</h1>
            <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb fs-sm wrap">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                    </ol>
                </nav>
            </div>
        </div>
</section>


<section class="py-5">
    <div class="container">
        <div class="grid lg:grid-cols-3 xl:grid-cols-4 gap-2 xl:gap-3">
            <div class="lg:col-2 xl:col-3">
                <div id="faqs" class="tour-details-section">
                    <div class="accordion" id="faq-accordion">
                        @foreach($faq_categories as $category)
                            @if(iterator_count($category->faqs))
                                <div class="mb-4">
                                    <h2 class="fs-lg mb-2 bold text-primary">{{ $category->name }}</h2>
                                    @foreach($category->faqs as $faq)
                                        <div class="accordion-item">
                                            <h3 class="accordion-header mb-0" id="heading{{ $faq->id }}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                                    {{ $faq->title }}
                                                </button>
                                            </h3>
                                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body fs-sm">
                                                    <?= $faq->content; ?>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
