<li class="list__item">
    <div class="list__item-container">
        <div class="list__item-media">
            @if(wp_check_filetype($item['icon'])['ext'] === 'svg')
            @svg('images.icons.border', ['class' => 'list__item-border'])
            {!! file_get_contents($item['icon']) !!}
            @else
            <img src="{{ $item['icon'] }}" class="list__item-img" alt="icon">
            @endif
        </div>
        <h3 class="list__item-title">{{ $item['title'] }}</h3>
        <div class="list__item-content">
            {!! apply_filters('the_content', $item['content']) !!}
        </div>
    </div>
</li>