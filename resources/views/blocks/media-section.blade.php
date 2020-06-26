<section class="section section--media media">
    <div class="container">
        <article class="media__content">
            <aside class="media__media">
                <div class="media__media-container">
                    @if($preview)
                    {!! wp_get_attachment_image($preview, 'preview-small', false, array('class' =>
                    'media__media-img')) !!}
                    @endif
                    <button class="media__media-play" aria-label="Play video">
                        @svg('images.svg.play-button', ['class' => 'icon media__media-icon'])
                    </button>
                </div>
                @if($list)
                <ul class="media__list">
                    @foreach ($list as $item)
                    <li class="media__item media__item--{{ $loop->iteration }}">
                        <span class="media__item-number">{{$item['number']}}<span
                                class="media__item-unit">@if(!empty($item['unit'])){{$item['unit']}}@endif</span></span>
                        <span class="media__item-content">{{$item['label']}}</span>
                    </li>
                    @endforeach
                </ul>
                @endif
            </aside>
            <div class="media__text">
                <header class="media__header">
                    @if(isset($heading))
                    <h2 class="media__title">{{ $heading }}</h2>
                    @endif
                </header>
                <main class="media__main">
                    @if(isset($content))
                    {!! apply_filters('the_content', $content) !!}
                    @endif
                </main>
                @if(!empty($cta_button))
                <footer class="media__footer">
                    <a class="media__button" href="{{ $cta_button[0]['link']['url'] }}"
                        {{ $cta_button[0]['link']['blank'] ? ' target="_blank" rel="noopener"' : '' }}>
                        {{ $cta_button[0]['link']['anchor'] }}
                    </a>
                </footer>
                @endif
            </div>
            @if($image)
            <div class="media__deco">
                {!! wp_get_attachment_image($image, 'preview', false, array('class' =>
                'media__img')) !!}
            </div>
            @endif
        </article>
    </div>
    <div class="media__modal">
        @if($medias)
        <video class="media__video" controls>
            @foreach ($medias as $media)
            <source src="{{ $media['media'] }}"
                type="{{ get_post_mime_type(attachment_url_to_postid($medias[0]['media'])) }}">
            @endforeach
            Your browser does not support the video tag.
        </video>
        @endif
    </div>
</section>