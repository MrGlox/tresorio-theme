<section class="section section--tabs tabs">
    <div class="container">
        <article class="tabs__content">
            <header class="tabs__header">
                <h2 class="tabs__title">{{ $title }}</h2>
            </header>
            <main id="tabs-system" class="tabs__container">
                @if($tabs)
                <ul class="tabs__list">
                    @foreach ($tabs as $item)
                    @include('components.tab-item', ['item' => $item, 'index' => $loop->iteration])
                    @endforeach
                </ul>
                @foreach ($tabs as $item)
                <div id="tab-{{ $loop->iteration }}" class="tabs__media">
                    {!!
                    wp_get_attachment_image($item['media'], 'preview-small', false, array('class'
                    => 'tabs__img
                    '))
                    !!}
                </div>
                @endforeach
                @endif
            </main>
        </article>
    </div>
</section>