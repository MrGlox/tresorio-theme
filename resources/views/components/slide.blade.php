<li class="glide__slide slider__item">
    @if(!empty($slide['link']))
    <a class="slider__item-link" {{ $slide['link']['blank'] ? ' target="_blank" rel="noopener"' : '' }}
        aria-label="{{ $slide['name'] }}" href="{{ $slide['link']['url'] }}">
        <main class="slider__item-content">
            {!! apply_filters('the_content', $slide['content']) !!}
        </main>
        <footer class="slider__item-author">
            <div class="slider__item-media">
                {!! wp_get_attachment_image($slide['image'], 'square', false, array('class' =>
                'slider__item-img
                ')) !!}
            </div>
            <div class="slider__item-details">
                <span class="slider__item-name">{{ $slide['name'] }}</span>
                <span class="slider__item-">{{ $slide['job'] }}</span>
            </div>
        </footer>
    </a>
    @else
    <div class="slider__item-container">
        <main class="slider__item-content">
            {!! apply_filters('the_content', $slide['content']) !!}
        </main>
        <footer class="slider__item-author">
            <div class="slider__item-picture">
                {!! wp_get_attachment_image($slide['image'], 'square', false, array('class' =>
                'slider__item-img
                ')) !!}
            </div>
            <div class="slider__item-details">
                <span class="slider__item-name">{{ $slide['name'] }}</span>
                <span class="slider__item-job">{{ $slide['job'] }}</span>
            </div>
        </footer>
    </div>
    @endif
</li>