@push('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
<!-- Header -->
<header class="header fixed flex items-center" x-data="{searchboxOpen:false, mobilenavOpen:false}">
    <div class="container relative flex justify-between items-center w-full">

        <!-- Logo -->
        <a class="logo flex-shrink-0" href="https://www.aviyangroup.com.np">
            <img src="{{ asset('assets/front/img/logo.png')}}" alt="Aviyan Group" height="48">
        </a><!-- Logo -->

        <div>{{--
            <div class="flex justify-end">
                <a href="" class="mr-4 top flex items-center text-xs">
                    Member Services
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                </a>
                <a href="" class="top flex items-center text-xs">
                    Check mail
                    <svg class="ml-2 w-4 h-4">
                        <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#mail" />
                    </svg>
                </a>
            </div>--}}

            <div class="flex items-center">
                <!-- Nav -->
                @include('front.elements.navbar')

                <!-- Search button -->
                {{--
                <div>
                    <button class="toggle-search-button p-4" @click="searchboxOpen=true">
                        <svg class="w-6 h-6">
                            <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#search" />
                        </svg>
                    </button>
                    <form id="search-form" action="{{ route('front.trips.search') }}" x-cloak x-show="searchboxOpen" class="flex absolute shadow-md" style="top:100%;right:0" @click.away="searchboxOpen=false">
                        <input id="header-search" type="search" name="keyword" value="{{ request()->get('keyword') }}" id="" placeholder="Search site" class="text-lg p-2 bg-gray">
                        <button type="submit" class="btn-accent p-2">
                            <svg class="w-6 h-6">
                                <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#arrownarrowright" />
                            </svg>
                        </button>
                    </form>
                </div> --}} <!-- Search button -->

                <div class="lg:none">
                    <button class="toggle-nav-button p-4" @click="mobilenavOpen=!mobilenavOpen">
                        <svg class="w-6 h-6" x-show="!mobilenavOpen">
                            <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#menu" />
                        </svg>
                        <svg class="w-6 h-6" x-cloak x-show="mobilenavOpen">
                            <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#x" />
                        </svg>
                    </button>
                </div>

                <!-- Donate  -->
                {{--
                <div>
                    <a href="https://www.aviyangroup.com.np/webmail" class="btn btn-accent">
                        Email
                    </a>
                </div>
                --}}

            </div>
        </div>

    </div>
</header><!-- Header -->
@push('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('assets/js/search-trips.js') }}"></script>
<script>
    //
    // Initialize jQuery Smartmenus
    $(function() {
        $('#main-nav').smartmenus();
    });

    const header = document.querySelector('header')
    const target = document.querySelector('#topIO')
    window.addEventListener('DOMContentLoaded', () => {

        const headerScrollObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if(!entry.isIntersecting){
                    header.classList.add('bg-white')
                    header.classList.add('shadow-md')
                }else {
                    header.classList.remove('bg-white')
                    header.classList.remove('shadow-md')
                }
            })
        })
        headerScrollObserver.observe(target)
    })
</script>
@endpush
