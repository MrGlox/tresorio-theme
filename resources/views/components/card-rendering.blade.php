<li class="rendering__item">
    <header class="rendering__item-header">
        <h3 class="rendering__item-title">{{ $card['title'] }}</h3>
        <span class="rendering__item-short">{{ $card['short'] }}</span>
    </header>
    <main class="rendering__item-content">
        <ul class="rendering__item-list">
            @foreach ($card['hardware_list'] as $item)
            <li class="rendering__item-item">
                {!! wp_get_attachment_image($item['icon'], 'square-small', false, array('class' =>
                'rendering__item-icon
                icon'))
                !!}
                {{ $item['label'] }}
            </li>
            @endforeach
        </ul>
    </main>
    <footer>
        <p class="rendering__item-price">
            <span class="rendering__item-value">
                {{ $card['price'] }}<span class="rendering__item-currency">€</span>
            </span>
            /h
        </p>
        @if(!empty($card['link']))
        <a class="rendering__item-link" {{ $card['link']['blank'] ? ' target="_blank" rel="noopener"' : '' }}
            href="{{ $card['link']['url'] }}">
            <span>{{ $card['link']['anchor'] }}</span>
            <span>{{ __('Unselect', 'sage') }}</span>
        </a>
        @endif
    </footer>
</li>