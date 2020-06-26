<li class="entries__item card card--press" data-seo>
    <header class="card__meta">
        <span class="card__date">{{ date('j M Y', strtotime($article['date'])) }}</span>
    </header>
    <main class="card__content">
        <div class="card__media">
            {!! wp_get_attachment_image($article['image'], 'thumbnail-square', false, array('class'
            => 'card__img
            ')) !!}
        </div>
        <h3 class="card__title">
            {{ $article['title'] }}
        </h3>
        @if(!empty($article['link']))
        <a class="card__link" aria-label="{{ $article['title'] }}"
            href="@if(!empty($cta_button[0]['media'])) {{ $article['media'] }} @else {{ $article['link']['url'] }} @endif"
            {{ $article['link']['blank'] ? ' target="_blank" rel="noopener"' : '' }}
            {{ $article['media'] ? ' download' : '' }}>
            @svg('images.icons.arrow-right-large', ['class' => 'icon card__icon'])
        </a>
        @endif
    </main>
</li>