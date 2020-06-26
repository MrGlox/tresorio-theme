@if(!empty($card[0]))
<article class="entries__item card card--cta">
    <header class="card__heading">
        <h3 class="card__title">{{ $card[0]['title'] }}</h3>
    </header>
    <main class="card__content">
        {!! apply_filters('the_content', $card[0]['description']) !!}
    </main>
    @if($card[0]['link'])
    <footer class="card__footer">
        <a class="card__link" aria-label="{{ $card[0]['link']['anchor'] }}"
            {{ $card[0]['link']['blank'] ? ' target="_blank" rel="noopener"' : '' }}
            href="{{ $card[0]['link']['url'] }}">
            {{ $card[0]['link']['anchor'] }}
        </a>
    </footer>
    @endif
</article>
@endif