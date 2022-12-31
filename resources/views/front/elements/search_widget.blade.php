<!-- Search Widget -->
<div id="search-widget" class="search-widget" x-cloak x-show.transition="searchWidgetOpen" @click.away="searchWidgetOpen=false">

    <!-- <button id="search-title" class="btn btn-theme" data-bs-toggle="collapse" data-bs-target="#search-widget-form"> -->
    <h1 class="bold flex jcsb aic p-2 upper">
        <div>
            <svg class="icon mr-2">
                <use xlink:href="{{ asset('assets/front/img/sprite.svg#search') }}" />
            </svg>
            Find tours
        </div>

        <button @click="searchWidgetOpen = false">
            <svg class="icon-md">
                <use xlink:href="{{ asset('assets/front/img/sprite.svg#x') }}" /></svg>
        </button>
    </h1>
    <!-- </button> -->

    <div class="p-2 scroll">
        <form action="{{ route('front.trips.search') }}" method="GET" id="search-widget-form">
            <h2>Destinations</h2>

            <div class="flex wrap mb-2">
                @foreach($destinations as $destination)
                    <div>
                        <input type="checkbox" id="dest-{{ $destination->id }}" class="visually-hidden" name="destination_id" value="{{ $destination->id }}">
                        <label for="dest-{{ $destination->id }}" class="px-2 py-1">
                            {{ $destination->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <h2>Activities</h2>

            <div class="mb-2">
                @foreach($activities as $activity)
                    <input type="checkbox" name="activity_id" class="visually-hidden" id="act-{{ $activity->id }}" value="{{ $activity->id }}">
                    <label class="clean" for="act-{{ $activity->id }}">{{ $activity->name }}</label>
                @endforeach
            </div>

            <h2>Duration</h2>

            <div class="mb-2">
                <input type="radio" name="duration" value="" id="dur1" class="visually-hidden" checked>
                <label class="clean" for="dur1">Any</label>
                <input type="radio" name="duration" value="" id="dur2" class="visually-hidden">
                <label class="clean" for="dur2">1 day</label>
                <input type="radio" name="duration" value="" id="dur3" class="visually-hidden">
                <label class="clean" for="dur3">2 -7 days</label>
                <input type="radio" name="duration" value="" id="dur4" class="visually-hidden">
                <label class="clean" for="dur4">8 days - 1 month</label>
                <input type="radio" name="duration" value="" id="dur5" class="visually-hidden">
                <label class="clean" for="dur5">1 month - 1 year</label>
            </div>

            <button id="search-title" class="btn btn-theme" data-toggle="collapse" data-target="#search-widget-form">
                Search
                <svg class="icon">
                    <use xlink:href="{{ asset('assets/front/img/sprite.svg#arrownarrowright') }}" />
                </svg>
            </button>
        </form>
    </div>

</div><!-- Search Widget -->
