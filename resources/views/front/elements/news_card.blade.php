<div class="bg-white">
    <a href="{{ $event->link }}" class="">
        <img src="{{ $event->mediumImageUrl }}" alt="">
        <div class="p-4 text-dark">
            <div class="flex mb-2 text-sm text-gray">
                <svg class="mr-2 w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ $event->formattedDate }}
            </div>
            <h3 class="mb-4 font-display font-bold text-xl">{{ $event->name }}</h3>
            <p class="mb-0">
                <?= truncate(removeStyleTags($event->description)); ?>
            </p>
        </div>
    </a>
</div>
