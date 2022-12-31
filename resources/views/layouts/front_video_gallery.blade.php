<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- meta tags --}}
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />
    <meta property="og:title" content="@yield('meta_og_title')" />
    <meta property="og:url" content="@yield('meta_og_url')" />
    <meta property="og:site_name" content="@yield('meta_og_site_name', Setting::get('site_name')??'Namaste Nepal Trekking & Research Hub Pvt.Ltd')" />
    <meta property="og:image" content="@yield('meta_og_image')" />
    <meta property="og:description" content="@yield('meta_og_description')" />
    {{-- end of meta tags --}}

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;600&family=Roboto:wght@700&display=swap" rel="stylesheet">

    {{-- Smartmenus --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/smartmenus@1.1.1/dist/css/sm-core-css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/smartmenus@1.1.1/dist/css/sm-simple/sm-simple.css">

    {{-- Fancybox --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">

    <!-- Raleway -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/front-style.css') }}">
    <link href="{{ asset('assets/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/front/css/front-style.css') }}"> --}}

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

    <style>
        [x-cloak] {
            display: none;
        }
        .bg-white .sm-simple >li> a{
            color: #124b80;
        }
        .sm-simple >li> a{
            font-family: 'Fira Sans', sans-serif;
            font-weight: 700;
            color: white;
            letter-spacing: 1px;
        }
        .bg-white .sm-simple >li> a:hover, .bg-white .sm-simple >li> a:focus, .bg-white .sm-simple >li> a:active{
            color: white;
        }
        .sm-simple >li> a:hover, .sm-simple >li> a:focus, .sm-simple >li> a:active{
            font-family: 'Fira Sans', sans-serif;
            font-weight: 700;
            background: #ff6913;
            letter-spacing: 1px;
            color: white;
        }
        .sm-simple a, .sm-simple a:hover, .sm-simple  a:focus, .sm-simple a:active {
            color: unset;
        }
        @media (max-width: 767px){
            .sm-simple a{
                color: #124b80 !important;
            }
            .sm-simple >li> a:hover, .sm-simple >li> a:focus, .sm-simple >li> a:active{
                background: #ff6913;
                color: white !important;
            }
        }
        @media (min-width: 768px){
            .sm-simple{
                border: none;
                background: transparent;
                box-shadow: none;
            }
            .sm-simple >li {
                border-left: none;
            }
            .sm-simple ul {
                border: none
            }
            .sm-simple a{
                color: #124b80;
            }
            .sm-simple a:hover, .sm-simple a:focus, .sm-simple a:active, .sm-simple a.highlighted{
                background: #ff6913;
                color: white !important;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- scrollspy for tour-details page -->

    <!-- Header -- Topbar & Navbar-->
    @include('front.elements.header')
    {{-- end of header --}}

    <div id="topIO"></div>

    @yield('content')

    <!-- Footer -->
    <!-- Footer -->
    <footer class="bg-primary text-white">
        <div class="container mb-4 fs-sm">
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-3">
                <div class="col-span-2">
                    <h1 class="font-display text-2xl text-white">Aviyan Investment Group</h1>
                    <ul class="mb-8">
                        <li class="flex"><a href="https://goo.gl/maps/trQsoytvDeNSp8Js7" target="_blank">
                                <svg class="flex-shrink-0 mr-1">
                                    <use
                                        xlink:href="{{ asset('assets/front/img/sprite.svg') }}#locationmarker" />
                                    </svg>
                                <span class="text-sm">{{ Setting::get('address') }}</span></a>
                        </li>
                        <li class="flex">
                            <svg class="flex-shrink-0 mr-1">
                                <use
                                    xlink:href="{{ asset('assets/front/img/sprite.svg') }}#phone" />
                                </svg>
                            <a class="text-sm"
                                href="tel:{{ Setting::get('mobile1') }}">{{ Setting::get('mobile1') }}</a>
                        </li>
                        <li class="flex">
                            <svg class="flex-shrink-0 mr-1">
                                <use
                                    xlink:href="{{ asset('assets/front/img/sprite.svg') }}#phone" />
                                </svg>
                            <a class="text-sm"
                                href="tel:{{ Setting::get('mobile2') }}">{{ Setting::get('mobile2') }}</a>
                        </li>
                        <li class="flex">
                            <svg class="flex-shrink-0 mr-1">
                                <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#mail" />
                                </svg>
                            <a class="text-sm"
                                href="mailto:{{ Setting::get('email') }}">{{ Setting::get('email') }}</a>
                        </li>
                    </ul>

                    <h1 class="font-display text-xl text-white">Follow us on</h1>

                    <ul class="social-links flex-wrap mb-4 text-white">
                        <li class="mb-1">
                            <a href="{{ Setting::get('facebook') }}" target="_blank">
                                <svg>
                                    <use
                                        xlink:href="{{ asset('assets/front/img/sprite.svg') }}#facebook" />
                                </svg>
                            </a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ Setting::get('twitter') }}" target="_blank">
                                <svg>
                                    <use
                                        xlink:href="{{ asset('assets/front/img/sprite.svg') }}#twitter" />
                                </svg>
                            </a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ Setting::get('instagram') }}" target="_blank">
                                <svg>
                                    <use
                                        xlink:href="{{ asset('assets/front/img/sprite.svg') }}#instagram" />
                                </svg>
                            </a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ Setting::get('whatsapp') }}">
                                <svg>
                                    <use
                                        xlink:href="{{ asset('assets/front/img/sprite.svg') }}#whatsapp" />
                                </svg>
                            </a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ Setting::get('viber') }}">
                                <svg>
                                    <use
                                        xlink:href="{{ asset('assets/front/img/sprite.svg') }}#viber" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h1>About Us</h1>
                    <ul>
                        @if($footer1)
                            @foreach($footer1 as $footer1_menu)
                                <li class="text-sm">
                                    <a
                                        href="{!! ($footer1_menu->link)?$footer1_menu->link:'javascript:;' !!}">{{ $footer1_menu->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="mb-4">
                    <h1>Committees</h1>
                    <ul class="mb-10">
                        @if($footer2)
                            @foreach($footer2 as $footer2_menu)
                                <li class="text-sm">
                                    <a
                                        href="{!! ($footer2_menu->link)?$footer2_menu->link:'javascript:;' !!}">{{ $footer2_menu->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>

                </div>
                <div class="mb-4">
                    <h1>Altitude</h1>
                    <ul>
                        @if($footer3)
                            @foreach($footer3 as $footer3_menu)
                                <li class="text-sm">
                                    <a
                                        href="{!! ($footer3_menu->link)?$footer3_menu->link:'javascript:;' !!}">{{ $footer3_menu->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <div style="padding-top: 40px;">
                        <a href="" class="btn btn-accent"
                            style="border: 5px solid; padding: 15px 50px;">
                            Donate
                        </a>
                    </div>
                    
                    <h1>Subscribe</h1>
                    <p class="mb-2">Subscribe to latest news and articles.</p>
                    <form id="email-subscribe-form" action="" class="mb-4">
                        <input type="email" required name="email" class="mb-2 p-4 text-lg" placeholder="Your email address">
                        <button type="submit" class="btn btn-accent">Subscribe</button>
                    </form>
                   
                </div>
            </div>
        </div>
        <div class="bg-primary text-xs text-center">
            <div class="container md:flex justify-between">
                <div class="mb-2">
                    &copy; {{ date('Y') }}. All right Reserved.
                </div>
                <div class="mb-4">
                    Powered by
                    <a href="https://thirdeyesystem.com">Third Eye Systems</a>
                </div>
            </div>
        </div>
    </footer><!-- Footer -->
    {{-- end of footer --}}

    <!-- Scripts -->
    <!-- jQuery-->
    <script src="{{ asset('assets/front/js/jQuery-3.3.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/smartmenus@1.1.1/dist/jquery.smartmenus.min.js"></script>
    <!-- Popper -->
    <!-- Bootstrap -->
    {{-- <script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}"></script> --}}
    <!-- App.js -->
    <script src="{{ asset('assets/front/js/app.js') }}"></script>
    <script src="{{ asset('assets/vendors/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/toastr-option.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var status = jqXHR.status;
                    if (status == 404) {
                        toastr.warning("Element not found.");
                    } else if (status == 422) {
                        toastr.info(jqXHR.responseJSON.message);
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {

            $('#email-subscribe-form').on('submit', function (event) {
                event.preventDefault();
                var form = $(this);
                var formData = form.serialize();

                $.ajax({
                    url: "{{ route('front.email-subscribers.store') }}",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    async: "false",
                    success: function (res) {
                        if (res.status == 1) {
                            toastr.success(res.message);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        var status = jqXHR.status;
                        if (status == 404) {
                            toastr.warning("Element not found.");
                        } else if (status == 422) {
                            toastr.info(jqXHR.responseJSON.errors.email[0]);
                        }
                    }
                });

            });
        });

    </script>
    @stack('scripts')
</body>
</html>
