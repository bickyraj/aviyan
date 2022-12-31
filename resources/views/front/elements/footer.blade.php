{{-- Videos --}}
<section>
    <div class="py-20">
        <div class="container">
            <div class="flex justify-between flex-wrap">
                <h2 class="text-center text-black mb-8 font-display text-4xl">Video Gallery </span></h2>
               <!--  <div>
                    <a href="{{ url('/video-gallery') }}" class="btn btn-primary">View All</a>
                </div> -->
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-10">
                @forelse ($videos as $video)
                    <div class="relative">
                        <img src="{{ $video->embed_img }}" alt="">
                        <a data-fancybox href="https://youtu.be/{{ $video->embed_code }}" class="absolute place-center text-white">
                            <div class="bg-primary rounded-full">
                                <svg class="block w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5"
                                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</section>{{-- Videos --}}

<!-- Footer -->
<footer class="bg-primary text-white">
    <div class="container mb-4 fs-sm">
        <div class="grid grid-cols-2 lg:grid-cols-5 gap-3">
            <div class="col-span-2">
                <h1 class="font-display text-2xl text-white">Aviyan Group</h1>
                <ul class="mb-8">
                    <li class="flex"><a href="" target="_blank">
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
                <h1>Download</h1>
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
                <h1>Quick Links</h1>
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
               <h1>Subscribe</h1>
                <p class="mb-2">Subscribe to latest news and articles.</p>
                <form id="email-subscribe-form" action="" class="mb-4">
                    <input type="email" required name="email" class="mb-2 p-4 text-lg" placeholder="Your email address">
                    <button type="submit" class="btn btn-accent">Subscribe</button>
                </form>
                
                {{-- <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=1708083832758663&autoLogAppEvents=1';
                    fjs.parentNode.insertBefore(js, fjs);
                  }(document, 'script', 'facebook-jssdk'));</script>
                  <div class="fb-page" data-href="" data-tabs="timeline" data-width="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"> --}}
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
@push('scripts')
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
@endpush
