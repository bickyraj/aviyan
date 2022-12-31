<div class="team-member border-light p-2  mb-2">
    <div class="grid lg:grid-cols-3 xl:grid-cols-4 gap-2 xl:gap-3">
        <div class="lg:col-span-1">
            <img class="img-fluid" src="{{ $item->imageUrl }}" alt="">
        </div>
        <div class="lg:col-2 xl:col-3">
            <h3 class="fs-lg text-primary">{{ $item->name }}</h3>

            <p class="title">{{ $item->position }}</p>
            <div class="lim" style="margin-bottom: 22px;">
                {!! truncate(strip_tags($item->description)) !!}
            </div>
            <a href="{{ route('front.teams.show', ['slug' => $item->slug]) }}" class="btn btn-theme btn-sm">Read more</a>
        </div>
    </div>
</div>
