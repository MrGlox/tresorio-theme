<section class="section section--timeline timeline">
    <div class="container">
        <article class="timeline__content">
            @svg('images.svg.timeline-start', ['class' => 'timeline__stroke timeline__stroke--start'],
            ['preserveAspectRatio' => 'none'])
            <header class="timeline__header">
                @svg('images.svg.timeline-first', ['class' => 'timeline__header-stroke'], ['preserveAspectRatio' =>
                'none'])
                <h2 class="timeline__title">{{ $title }}</h2>
                <div class="timeline__text">
                    {!! apply_filters('the_content', $content) !!}
                </div>
            </header>
            <main class="timeline__container">
                @svg('images.svg.timeline-vertical', ['class' => 'timeline__container-stroke'],
                ['preserveAspectRatio' => 'none'])
                <div class="timeline__item timeline__item--first">
                    <h3 class="timeline__item-title">{{ $main_list[0]['year'] }}</h3>
                    <ul class="timeline__sublist">
                        <li class="timeline__subitem">
                            @svg('images.svg.timeline-first-mounth', ['class' => 'timeline__subitem-stroke'],
                            ['preserveAspectRatio' => 'none'])
                            <h4 class="timeline__subitem-title">{{ $main_list[0]['list'][0]['date'] }}</h4>
                            <div class="timeline__subitem-content">{!! apply_filters('the_content',
                                $main_list[0]['list'][0]['content']) !!}</div>
                        </li>
                    </ul>
                </div>
                <ul class="timeline__list">
                    @foreach ($main_list as $item)
                    @if($loop->index > 0)
                    @include('components.timeline-item', ['item' => $item, 'loop' => $loop])
                    @endif
                    @endforeach
                </ul>
            </main>
            @if(!empty($media))
            <aside class="timeline__media">
                {!! wp_get_attachment_image($media, 'vertical', false, array('class' =>
                'timeline__img'))
                !!}
            </aside>
            @endif
            @svg('images.svg.timeline-end', ['class' => 'timeline__stroke timeline__stroke--end'],
            ['preserveAspectRatio' => 'none'])
        </article>
    </div>
</section>