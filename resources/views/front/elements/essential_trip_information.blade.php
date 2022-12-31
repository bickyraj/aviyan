@if ($essential_trip_informations)
<div class="mb-3 essential-info">
    <h3>Essential Trip Information</h3>
    <ul class="essential-links">
        @foreach ($essential_trip_informations as $trip_info)
        <li>
            <a href="{!! ($trip_info->link)?$trip_info->link:'javascript:;' !!}" target="_blank">
            <svg class="icon mr-1">
                <use xlink:href="{{ asset('assets/front/img/sprite.svg#arrownarrowright') }}" /></svg>

            {{ $trip_info->name }} </a>
        </li>
        @endforeach
    </ul>
</div>
@endif
