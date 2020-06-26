<section class="section section--numbers numbers">
    <div class="container">
        <article class="numbers__content">
            <header class="numbers__header">
                <h2 class="numbers__title">{{ $title }}</h2>
                <div class="numbers__text">
                    {!! apply_filters('the_content', $content) !!}
                </div>
            </header>
            <main class="numbers__container">
                <ul class="numbers__list">
                    @foreach ($list as $item)
                    @include('components.number-item', ['item' => $item])
                    @endforeach
                </ul>
            </main>
            <footer class="numbers__footer">
                @if(!empty($link))
                <a class="numbers__link" {{ $link['blank'] ? ' target="_blank" rel="noopener"' : '' }} href="{{ $link['url'] }}">
                    {{ $link['anchor'] }}
                </a>
                @endif
            </footer>
        </article>
    </div>
</section>