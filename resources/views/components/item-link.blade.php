<li class="list__item">
    <a class="list__item-link" href="{{ $item['link']['url'] }}" {{ $item['link']['blank'] ? ' target="_blank" rel="noopener"' : '' }}>
        <div class="list__item-media">
            @svg('images.icons.border', ['class' => 'list__item-border'])
            {!! file_get_contents($item['icon']) !!}
        </div>
        <h3 class="list__item-title">{{ $item['link']['anchor'] }}</h3>
    </a>
</li>