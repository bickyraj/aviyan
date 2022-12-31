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
@extends('layouts.front')
@section('content')
    <section>
        <div class="hero-alt relative">
            <img src="{{ asset('assets/front/img/bg1.jpg') }}" alt="">
            <div class="text absolute flex items-center">
                <div class="container">
                    <h1 class="text-white text-vw-lg font-bold">Contact Us</h1>
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
                            Contact Us
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-gray py-10">
        <div class="container">
            <div class="grid lg:grid-cols-2 gap-10 bg-white shadow-md">
                <div class="px-10 py-20">
                    <div class="mb-10">
                        <h1 class="mb-8 font-display text-3xl text-primary">Aviyan Investment Group</h1>
                        <ul class="mb-8">
                            <li class="flex mb-4">
                                
                                <svg class="flex-shrink-0 w-6 h-6 mr-1 text-primary">
                                    <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#locationmarker" />
                                </svg><a href="https://goo.gl/maps/trQsoytvDeNSp8Js7" target="_blank">
                                <div>
                                    <div class="mb-2 text-lg">{{ Setting::get('address') }}</div>
                                    
                                </div></a>
                            </li>
                            <li class="flex mb-4">
                                <svg class="flex-shrink-0 w-6 h-6 mr-1 text-primary">
                                    <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#phone" /></svg>
                                <a class="text-lg" href="tel:{{ Setting::get('mobile1') }}">{{ Setting::get('mobile1') }}</a>
                            </li>
                            <li class="flex mb-4">
                                <svg class="flex-shrink-0 w-6 h-6 mr-1 text-primary">
                                    <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#phone" /></svg>
                                <a class="text-lg" href="tel:{{ Setting::get('mobile2') }}">{{ Setting::get('mobile2') }}</a>
                            </li>
                            <li class="flex mb-4">
                                <svg class="flex-shrink-0 w-6 h-6 mr-1 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                    <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#phone" /></svg>
                                <div class="text-lg">Post Box No: 44600</div>
                            </li>
                           
                            <li class="flex mb-4">
                                <svg class="flex-shrink-0 w-6 h-6 mr-1 text-primary">
                                    <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#mail" /></svg>
                                <a class="text-lg" href="mailto:info@aviyangroup.com">info@aviyangroup.com</a>
                            </li>
                            
                               <li class="flex mb-4">
                                <svg class="flex-shrink-0 w-6 h-6 mr-1 text-primary">
                                    <use xlink:href="#" />
                                </svg>
                                <div>
                                    <div class="mb-2 text-lg">Opening Hours</div>
                                    <div class="flex"><span class="mr-10 w-20">Sun – Thu</span> 10:00 AM – 5:00 PM</div>
                                    <div class="flex"><span class="mr-10 w-20">Fri </span> 10:00 AM – 3:00 PM</div>
                                    <div class="flex"><span class="mr-10 w-20">Sat & Gov Holidays</span> Closed</div>
                                </div>
                            </li>
                        </ul>

                        <h1 class="font-display text-xl text-white">Follow us on</h1>

                        <ul class="flex flex-wrap text-white">
                            <li class="mr-4">
                                <a href="{{ Setting::get('facebook') }}">
                                    <svg class="w-6 h-6 text-primary">
                                        <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#facebook" />
                                    </svg>
                                </a>
                            </li>
                            <li class="mr-4">
                                <a href="{{ Setting::get('twitter') }}">
                                    <svg class="w-6 h-6 text-primary">
                                        <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#twitter" />
                                    </svg>
                                </a>
                            </li>
                            <li class="mr-4">
                                <a href="{{ Setting::get('instagram') }}">
                                    <svg class="w-6 h-6 text-primary">
                                        <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#instagram" />
                                    </svg>
                                </a>
                            </li>
                            <li class="mr-4">
                                <a href="{{ Setting::get('whatsapp') }}">
                                    <svg class="w-6 h-6 text-primary">
                                        <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#whatsapp" />
                                    </svg>
                                </a>
                            </li>
                            <li class="mr-4">
                                <a href="{{ Setting::get('viber') }}">
                                    <svg class="w-6 h-6 text-primary">
                                        <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#viber" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <form id="captcha-form" action="{{ route('front.contact.store') }}" class="px-10 py-20 mb-10">
                    @csrf
                    <h1 class="mb-8 font-display text-2xl text-primary">Send us a message</h1>
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm">Your Name</label>
                        <input type="text" id="name" class="bg-gray w-full p-4 text-lg" placeholder="Your Name" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm">Your Email</label>
                        <input type="text" id="email" class="bg-gray w-full p-4 text-lg" placeholder="Your Email" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block mb-2 text-sm">Your Message</label>
                        <textarea id="message" class="bg-gray w-full p-4 text-lg" rows="8" placeholder="Your Message" required></textarea>
                    </div>
                    @include('front.elements.recaptcha')
                    <button class="btn btn-primary">Send</button>
                </form>
                <div class="lg:col-span-2">
                    <iframe src="" width="100%" height="450" frameborder="0" allowfullscreen="allowfullscreen" class="block"></iframe>
                </div>
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
