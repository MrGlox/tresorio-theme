<li class="glide__slide slider__item">
    <a class="slider__item-link" href="{{ $logo['link']['url'] }}" aria-label="Twitter"
        {{  $logo['link']['blank'] ? ' target="_blank" rel="noopener"' : '' }}>
        {!! wp_get_attachment_image($logo['image'], 'logo', false, array('class' =>
        'slider__item-media
        ')) !!}
    </a>
</li>