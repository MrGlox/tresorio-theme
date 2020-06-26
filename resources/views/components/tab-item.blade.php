<li class="tabs__item">
    <a class="tabs__item-inner" href="#tab-{{ $index }}" aria-label="{{ $item['title'] }}">
        <header class="tabs__item-media">
            @if(!empty($item['icon']))
            {!! file_get_contents($item['icon']) !!}
            @endif
        </header>
        <main class="tabs__item-entry">
            <span class="tabs__item-title tabs__item-title--sub">{{ $item['category'] }}</span>
            <h3 class="tabs__item-title">{{ $item['title'] }}</h3>
            <div class="tabs__item-content">
                {!! apply_filters('the_content', $item['content']) !!}
            </div>
            @if(!empty($item['link']))
            <button class="tabs__item-link" href="{{ $item['link']['url'] }}"
                {{ $item['link']['blank'] ? ' target="_blank" rel="noopener"' : '' }}>
                {{ $item['link']['anchor'] }}
            </button>
            @endif
        </main>
    </a>
</li>