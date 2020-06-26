@if ($cta)
<ul class="menu__cta-list">
    @foreach ($cta as $item)
    <li class="menu__cta-item">
        @if($item->url !== "#")
        <a class="menu__cta-link {{ carbon_get_nav_menu_item_meta( $item->id, 'class_list') }}" href="{{ $item->url }}">
            {{ $item->label }}
        </a>
        @else
        <span class="menu__cta-span {{ carbon_get_nav_menu_item_meta( $item->id, 'class_list') }}">
            {{ $item->label }}
        </span>
        @endif
    </li>
    @endforeach
</ul>
@endif