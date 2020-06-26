<section class="section section--packs packs">
    <div class="container packs__container">
        <article class="packs__content">
            <header class="packs__header">
                <h2 class="packs__title">{{ $title }}</h2>
                <div class="packs__text">
                    {!! apply_filters('the_content', $content) !!}
                </div>
            </header>
            <main class="packs__container">
                <ul class="packs__list">
                    @foreach ($cards as $card)
                    @include('components.card-packs', ['card' => $card])
                    @endforeach
                </ul>
            </main>
        </article>
    </div>
</section>