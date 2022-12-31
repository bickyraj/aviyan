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
   {{-- <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;600&family=Roboto:wght@700&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

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
    
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "103613605801185");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v14.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    

    <style>
        [x-cloak] {
            display: none;
        }
        .bg-white .sm-simple >li> a{
            color: #124b80;
        }
        .sm-simple >li> a{
            font-family: 'Poppins', sans-serif;
           color: #fff109;
        }
        .bg-white .sm-simple >li> a:hover, .bg-white .sm-simple >li> a:focus, .bg-white .sm-simple >li> a:active{
            color: white;
        }
        .sm-simple >li> a:hover, .sm-simple >li> a:focus, .sm-simple >li> a:active{
            font-family: 'Poppins', sans-serif;
            background: #15821e;
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
                background: #15821e;
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
                background: #0d5d14;
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
    @include('front.elements.footer')
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
     <script src="{{ asset('assets/front/js/bootstrap.js') }}"></script>
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
   
     <div class="modal fade" id="important-notice-modal" tabindex="-1" role="dialog" aria-labelledby="important-notice-modalLabel" aria-hidden="true" style="display: block; padding-left: 0px;">
      
        <div class="modal-dialog" role="document" style="max-width: 550px;">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="pull-left">
                        
                    </div>
                    <div class="modal-footer" style="text-align: center!important;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                    <a href="">
                   <img src="https://www.aviyangroup.com.np/assets/front/img/notice1.jpg" class="logo" alt="logo" itemprop="logo" style="height: 90vh;">
                    <div class="form-group text-center"></a>
                        
                    </div>
                </div>
                
                </div>
            </div>
         </div>
    </div>
    

    <script>
        $('#important-notice-modal').modal('show');
        $('#important-notice-modal').on('hidden.bs.modal', function() {
            var date = new Date();
            date.setTime(date.getTime() + (60 * 60 * 1000));
            document.cookie = "important_notice_closed=1; expires= " + date.toGMTString() + "; path=/ "
        })
    </script>
    
    @stack('scripts')
</body>
</html>
