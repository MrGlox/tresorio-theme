<section class="section section--rendering rendering">
    <div class="container rendering__container">
        <article class="rendering__content">
            <header class="rendering__header">
                <h2 class="rendering__title">{{ $title }}</h2>
                <div class="rendering__text">
                    {!! apply_filters('the_content', $content) !!}
                </div>
            </header>
            <main class="rendering__main">
                <ul class="rendering__list">
                    @foreach ($cards as $card)
                    @include('components.card-rendering', ['card' => $card])
                    @endforeach
                </ul>
            </main>
            <aside class="rendering__calculation">
                <h3 class="rendering__title rendering__title--sub">{{ $subtitle }}</h3>
                <div class="js-rendering-form rendering__form">
                    <div class="range__container">
                        <label class="range__label range__label--small"
                            for="multiply">{{ __('Multiply performances', 'sage') }}</label>
                        <input id="multiply" name="multiply" type="range" min="1" max="10" value="1" step="1"
                            class="range">
                    </div>
                    {{-- <p class="rendering__label">{{ __('Divide your rendering time', 'sage') }}</p>
                    <p class="rendering__price">
                        <span class="rendering__value js-rendering-time">
                            48<span class="rendering__currency">h</span>
                        </span>
                    </p> --}}
                    <p class="rendering__label">{{ __('Total price', 'sage') }}</p>
                    <p class="rendering__price">
                        <span class="rendering__value js-rendering-price">
                            2<span class="rendering__currency">{{ __('€', 'sage') }}</span>
                        </span>
                    </p>
                    <a class="rendering__link" href="{{ $link['url'] }}"
                        {{ $link['blank'] ? ' target="_blank" rel="noopener"' : '' }}>
                        {{ $link['anchor'] }}
                    </a>
                </div>
            </aside>
        </article>
    </div>
</section>