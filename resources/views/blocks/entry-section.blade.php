<section class="section section--entry entry">
    <div class="container">
        <article class="entry__content">
            <aside class="entry__media">
                <div class="entry__media-container">
                    {{-- <video controls>
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                    </video> --}}
                </div>
                <ul class="entry__list">
                    <li class="entry__item">
                        <span class="entry__item-number"></span>
                        <span class="entry__item-content"></span>
                    </li>
                </ul>
            </aside>
            <div class="entry__text">
                <header class="entry__header">
                    @if(isset($heading))
                    <h2 class="entry__title">{{ $heading }}</h2>
                    @endif
                </header>
                <main class="entry__main">
                    @if(isset($content))
                    {!! apply_filters('the_content', $content) !!}
                    @endif
                </main>
                @if(!empty($cta_button))
                <footer class="entry__footer">
                    <a class="entry__button" href="{{ $cta_button[0]['link']['url'] }}"
                        {{ $cta_button[0]['link']['blank'] ? ' target="_blank" rel="noopener"' : '' }}>
                        {{ $cta_button[0]['link']['anchor'] }}
                    </a>
                </footer>
                @endif
            </div>
            @if($main_image[0])
            <div class="entry__deco">
                {!! wp_get_attachment_image($main_image[0]['image'], 'preview', false, array('loading' => 'lazy',
                'class' =>
                'entry__img')) !!}
            </div>
            @endif
        </article>
    </div>
</section>