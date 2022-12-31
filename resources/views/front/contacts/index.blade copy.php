<?php
  if (session()->has('success_message')) {
    $session_success_message = session('success_message');
    session()->forget('success_message');
  }

  if (session()->has('error_message')) {
    $session_error_message = session('error_message');
    session()->forget('error_message');
  }
?>
@extends('layouts.front_inner')
@section('content')
<!-- Hero -->
<section class="hero hero-alt relative">
    <img src="{{ asset('assets/front/img/hero.jpg') }}" alt="">
    <div class="overlay absolute">
        <div class="container ">
            <h1>Contact Us</h1>
            <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb fs-sm wrap">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="grid lg:grid-cols-3 xl:grid-cols-4 gap-2 xl:gap-3">
            <div class="lg:col-2 xl:col-3">
                <h2 class="text-primary bold">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor voluptas expedita aspernatur voluptates
                    laudantium natus deleniti nobis. Quos quibusdam hic perferendis incidunt dolorem inventore odit officiis
                    impedit optio, distinctio rerum praesentium quod fugiat ab a maiores similique eius, quia placeat? Vel sequi
                    quo
                    omnis?
                </p>
                <form id="captcha-form" action="{{ route('front.contact.store') }}" method="POST">
                    @csrf
                    <div class="grid lg:grid-cols-3">
                        <div class="lg:col-2">
                            <div class="form-group mb-2">
                                <label for="">Name <sup>*</sup></label>
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">E-mail <sup>*</sup></label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Country <sup>*</sup></label>
                                @include('front.elements.country')
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Phone Number <sup>*</sup></label>
                                <input name="phone" type="tel" class="form-control" placeholder="Phone No.">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Message <sup>*</sup></label>
                                <textarea name="message" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <input type="hidden" id="recaptcha" name="g-recaptcha-response">
                                @include('front.elements.recaptcha')
                                <button type="submit" class="btn btn-theme">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <aside>
                <div class="p-2 border-light">
                    <div class="card-body">
                        <div class="text-center mb-2">
                            <a href="#" class="flex">
                                <svg class="icon-md shrink-0 mr-1 text-primary">
                                    <use xlink:href="{{ asset('assets/front/img/sprite.svg#locationmarker') }}" />
                                </svg>
                                {{ Setting::get('address') ?? '' }}
                                <small></small>
                        </div>
                        <div class="text-center mb-2">
                            <a href="#" class="flex">
                                <svg class="icon-md shrink-0 mr-1 text-primary">
                                    <use xlink:href="{{ asset('assets/front/img/sprite.svg#mail') }}" />
                                </svg>
                                {{ Setting::get('email') ?? '' }}
                            </a>
                            <small></small>
                        </div>
                        <div class="text-center mb-2">
                            <a href="#" class="flex">
                                <svg class="icon-md shrink-0 mr-1 text-primary">
                                    <use xlink:href="{{ asset('assets/front/img/sprite.svg#phone') }}" />
                                </svg>
                                {{ Setting::get('mobile1') ?? '' }}
                            </a>
                        </div>
                        <div class="text-center mb-3">
                            <a href="#" class="flex">
                                <svg class="icon-md shrink-0 mr-1 text-primary">
                                    <use xlink:href="{{ asset('assets/front/img/sprite.svg#phone') }}" />
                                </svg>
                                {{ Setting::get('mobile2') ?? '' }}
                            </a>
                        </div>
                        <p class="text-center mb-0">
                            <a href="{{ Setting::get('facebook') }}" class="text-primary hover:text-accent mr-2">
                                <svg class="icon-md">
                                    <use xlink:href="{{ asset('assets/front/img/sprite.svg#facebookmessenger') }}" /></svg>
                            </a>
                            <a href="{{ Setting::get('viber') }}" class="text-primary hover:text-accent mr-2">
                                <svg class="icon-md">
                                    <use xlink:href="{{ asset('assets/front/img/sprite.svg#viber') }}" /></svg>
                            </a>
                            <a href="{{ Setting::get('whatsapp') }}" class="text-primary hover:text-accent mr-2">
                                <svg class="icon-md">
                                    <use xlink:href="{{ asset('assets/front/img/sprite.svg#whatsapp') }}" /></svg>
                            </a>
                            <a href="{{ Setting::get('skype') }}" class="text-primary hover:text-accent mr-2">
                                <svg class="icon-md">
                                    <use xlink:href="{{ asset('assets/front/img/sprite.svg#skype') }}" /></svg>
                            </a>
                        </p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script type="text/javascript">
  $(function() {
    var session_success_message = '{{ $session_success_message ?? '' }}';
    var session_error_message = '{{ $session_error_message ?? '' }}';
    if (session_success_message) {
      toastr.success(session_success_message);
    }

    if (session_error_message) {
      toastr.error(session_error_message);
    }
  });
</script>
@endpush
