<section class="entries entries--darker">
    <article class="page__inner entries__container">
        <header class="entries__header">
            <h2 class="entries__title">{{ $heading }}</h2>
            <div class="entries__content">
                {!! apply_filters('the_content', $content) !!}
            </div>
        </header>
        <main class="entries__main">
            <ul class="entries__list">
                @if (!empty($articles))
                @foreach ($articles as $article)
                @include('components.card-press-item', ['article' => $article])
                @endforeach
                @endif
            </ul>
        </main>
    </article>
</section>