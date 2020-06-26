<li class="packs__item">
    <header class="packs__item-header">
        <h3 class="packs__item-title">{{ $card['title'] }}</h3>
        <span class="packs__item-short">{{ $card['short'] }}</span>
    </header>
    <main class="packs__item-content">
        <ul class="packs__item-list">
            @foreach ($card['hardware_list'] as $item)
            <li class="packs__item-item">
                {!! wp_get_attachment_image($item['icon'], 'square-small', false, array('class' =>
                'packs__item-icon icon
                '))
                !!}
                {{ $item['label'] }}
            </li>
            @endforeach
        </ul>
    </main>
    <footer>
        <p class="packs__item-price">
            <span class="packs__item-value">
                {{ $card['price'] }}<span class="packs__item-currency">€</span>
            </span>
            /h
        </p>
        @if(!empty($card['link']))
        <a class="packs__item-link" {{ $card['link']['blank'] ? ' target="_blank" rel="noopener"' : '' }}
            href="{{ $card['link']['url'] }}">
            {{ $card['link']['anchor'] }}
        </a>
        @endif
    </footer>
</li>