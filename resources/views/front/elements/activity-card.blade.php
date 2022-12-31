<a href="{{ route('front.activities.show', $activity->slug) }}">
    <div class="activity">
        <img src="{{ $activity->imageUrl }}" alt="">
        <div class="activity-title">
            <h2>{{ $activity->name }}</h2>
            <svg>
                <use xlink:href="{{ asset('assets/front/img/sprite.svg') }}#arrownarrowright" /></svg>
        </div>
        <div class="tours">
            <div class="fs-xl bold">{{ $activity->trips->count() }}</div>
            <div class="fs-sm">tours</div>
        </div>
    </div>
</a>
