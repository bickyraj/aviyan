@extends('layouts.front_inner')
<?php
  if (session()->has('message')) {
    $session_success_message = session('message');
    session()->forget('message');
  }
?>
@push('styles')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
@section('content')
<section class="hero hero-alt relative">
    <img src="{{ asset('assets/front/img/hero.jpg') }}" alt="">
    <div class="overlay absolute">
        <div class="container ">
            <h1>Rate the tour</h1>
            <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb fs-sm wrap">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Review</li>
                    </ol>
                </nav>
            </div>
        </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="grid lg:grid-cols-3 xl:grid-cols-4 gap-2 xl:gap-3">
            <div class="lg:col-2 xl:col-3">
                <form id="review-form" action="{{ route('front.reviews.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2 class="fs-lg bold text-primary mb-2">Your personal details</h2>
                    <div class="grid lg:grid-cols-3 gap-2 mb-2">
                        <div class="form-group">
                            <label for="">Your Photo *</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Name <span style="color:red;">*</span></label>
                            <input type="text" name="review_name" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Country *</label>
                            @include('front.elements.country')
                        </div>
                        <div class="form-group">
                            <label for="">Difficulty</label>
                            <select name="" id="" class="form-control">
                                <option value="" selected>Easy</option>
                                <option value="">Moderate</option>
                                <option value="">Difficult</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <hr class="mb-2">
                    <h2 class="fs-lg bold text-primary mb-2">Review details</h2>
                    <div class="grid lg:grid-cols-3 gap-2 mb-2">

                        <div class="form-group">
                            <label for="">Tour Package You Completed *</label>
                            <select name="trip_id" class="form-control" required>
                              <option value="" selected disabled>Choose a package</option>
                              @foreach($trips as $trip)
                              <option value="{{ $trip->id }}">{{ $trip->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Short Title *</label>
                            <input type="text" name="title" placeholder="Short Title" required>
                        </div>
                        <div class="form-group">
                            <label for="">Rate *</label>
                            <input type="hidden" id="rating" name="rating" value="5" required>
                            <div class="stars text-primary flex">
                                <div class="star">
                                    <svg class="icon-md">
                                        <use xlink:href="{{ asset('assets/front/img/sprite.svg#star') }}" /></svg>
                                </div>
                                <div class="star">
                                    <svg class="icon-md">
                                        <use xlink:href="{{ asset('assets/front/img/sprite.svg#star') }}" /></svg>
                                </div>
                                <div class="star">
                                    <svg class="icon-md">
                                        <use xlink:href="{{ asset('assets/front/img/sprite.svg#star') }}" /></svg>
                                </div>
                                <div class="star">
                                    <svg class="icon-md">
                                        <use xlink:href="{{ asset('assets/front/img/sprite.svg#star') }}" /></svg>
                                </div>
                                <div class="star">
                                    <svg class="icon-md">
                                        <use xlink:href="{{ asset('assets/front/img/sprite.svg#star') }}" /></svg>
                                </div>
                            </div>

                            <script>
                                const starsSvgs = document.querySelectorAll('.stars svg')
                                const ratingInput = document.querySelector('#rating')
                                starsSvgs.forEach((starsSvg, i) => {
                                    starsSvg.addEventListener('click', () => {
                                        ratingInput.value = i + 1
                                        starsSvgs.forEach((star, j) => {
                                            if (j > i) {
                                                star.querySelector('use').setAttributeNS('http://www.w3.org/1999/xlink', 'xlink:href', '{!! asset("assets/front/img/sprite.svg#staro") !!}')
                                            } else {
                                                star.querySelector('use').setAttributeNS('http://www.w3.org/1999/xlink', 'xlink:href', '{!! asset("assets/front/img/sprite.svg#star") !!}')
                                            }
                                        })
                                    })
                                })
                            </script>
                        </div>
                        <div class="form-group lg:col-2">
                            <label for="">Message</label>
                            <textarea id="" name="review" class="form-control" cols="30" rows="3" placeholder="Message"></textarea>
                        </div>
                    </div>

                    <div class="g-recaptcha"
                          data-sitekey="{{ config('constants.google_recaptcha') }}"
                          data-callback="onSubmitReview"
                          data-size="invisible">
                    </div>
                    <button type="submit" class="btn btn-theme">Submit</button>
                </form>
            </div>

            <aside>
                <div class="border-light p-2">
                    <h2 class="fs-lg text-primary bold">Annapurna Base Camp Trek</h2>
                    <div class="card-body">
                        <p>16 days</p>
                        <div>Earliest Fixed Depature Date</div>
                        <p>1 Jan 2020</p>
                        <b>USD 20,000</b> per person
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="./assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="./assets/vendors/jquery-validation/dist/additional-methods.min.js"></script>
<script>
    var session_success_message = '{{ $session_success_message ?? '' }}';
    if (session_success_message) {
      toastr.success(session_success_message);
    }

    function onSubmitReview(token) {
        $("#review-form").submit();
        return true;
    }

    var validator = $("#review-form").validate({
        ignore: "",
        rules: {
            'name': 'required',
            'country': 'required',
            'title': 'required',
            'review': 'required',
        },
        submitHandler: function(form, event) {
            event.preventDefault();
            if (grecaptcha.getResponse()) {
                var btn = $(form).find('button[type=submit]').attr('disabled', true).html('Submitting...');
                setTimeout(() => {
                    form.submit();
                }, 500);
            }else{
                grecaptcha.reset();
                grecaptcha.execute();
            }
        },
    });
</script>
@endpush
