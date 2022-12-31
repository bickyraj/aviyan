<nav :class="{show: mobilenavOpen}">
    <ul id="main-nav" class="sm sm-simple">
        @if($menus)
            @foreach($menus as $menu)
                <li>
                    <a href="{!! ($menu->link)?$menu->link:'javascript:;' !!}" class="font-display font-bold text-primary">{{ $menu->name }}</a>
                    @if(iterator_count($menu->children))
                        <ul>
                            @foreach($menu->children()->orderBy('display_order', 'asc')->get() as $child)
                                <li>
                                    <a href="{!! ($child->link)?$child->link:'javascript:;' !!}" class="font-display font-bold text-primary">{{ $child->name }}</a>
                                    @if(iterator_count($child->children))
                                      @include('front.elements.child-menu', ['children' => $child->children()->orderBy('display_order', 'asc')->get(), 'n_count' => 2])
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        @endif
    </ul>
</nav>
