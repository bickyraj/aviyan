<div class="masonry-item p-4">
    <a href="{{ route('front.blogs.show', ['slug' => $blog->slug]) }}">
    <div class="bg-white shadow-md">
        @php
            $bg = "";
            if($blog->mediumImageUrl != "") {
                $bg = 'linear-gradient(rgba(0,0,0,0), rgba(0,0,0,.8)),center / cover url(' . $blog->mediumImageUrl . ')';
            }
        @endphp
        <div style="background: {{ $bg }}">
            <div class="{{ ($blog->mediumImageUrl != "")? 'text-white px-4 py-10': 'text-dark p-4 pt-20' }}">
                <div class="flex mb-2 text-sm">
                    <svg class="mr-2 w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ $blog->formattedDate }}
                </div>
                <h3 class="mb-4 font-display font-bold text-2xl">{{ $blog->name }}</h3>
                <p class="mb-0">
                    <?= truncate(removeStyleTags($blog->description)); ?>
                </p>
            </div>
        </div>
    </div>
    </a>
</div>
