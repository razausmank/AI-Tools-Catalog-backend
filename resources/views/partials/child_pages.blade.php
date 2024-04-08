

<li class="menu-item  menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
    <a href="{{ $child_category->url == "#" ? '#' : route($child_category->url)  }}" class="menu-link " ><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">{{ $child_category->name }}</span>
        @if( $child_category->pages->isNotEmpty() )
            <i class="menu-arrow"></i>
        @endif
    </a>

    @if ( $child_category->pages )

            @foreach ( $child_category->pages as $childCategory )
                <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                    <ul class="menu-subnav">
                    @include('partials.child_pages', ['child_category' => $childCategory])
                    </ul>
                </div>
            @endforeach


    @endif
</li>



