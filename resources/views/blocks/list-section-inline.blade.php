<section class="section section--list list list--inline">
    <div class="container">
        <article class="list__content">
            <header class="list__header">
                <h2 class="list__title">{{ $title }}</h2>
                <div class="list__text">
                    {!! apply_filters('the_content', $content) !!}
                </div>
            </header>
            <main class="list__container">
                <ul class="list__list">
                    @foreach ($list as $item)
                    @include('components.item-link', ['item' => $item, 'index' => $loop->iteration])
                    @endforeach
                </ul>
            </main>
        </article>
    </div>
</section>