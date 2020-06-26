<section class="section section--hero hero @if(!is_front_page())hero--product @endif">
    @if(is_front_page())
    @svg('images.svg.hero-offset', ['class' => 'hero__offset'], ['preserveAspectRatio' => 'xMidYMax slice'])
    @endif
    <div class="container">
        <article class="hero__container">
            @if(function_exists('yoast_breadcrumb') && !is_front_page())
            {!! yoast_breadcrumb( '<p class="breadcrumbs" id="breadcrumbs">','</p>' ) !!}
            @svg('images.svg.hero-particles', ['class' => 'hero__particles'], ['preserveAspectRatio' => 'xMidYMax
            slice'])
            @endif
            <div class="hero__content">
                <h1 class="hero__title">
                    {{ $title }}
                </h1>
                <div class="hero__text">
                    @if(isset($description))
                    {!! apply_filters('the_content', $description) !!}
                    @endif
                </div>
                <a class="hero__button" href="{{ $link['url'] }}"
                    {{ $link['blank'] ? ' target="_blank" rel="noopener"' : '' }}>
                    {{ $link['anchor'] }}
                </a>
            </div>
            <div class="hero__media @if($animation_data) hero__media--animated @endif">
                {!! wp_get_attachment_image($media, 'preview-small', false, array('class' =>
                'hero__img')) !!}
                @if($animation_data)
                <div class="hero__data" data-src="{{ $animation_data }}"></div>
                @endif
            </div>
        </article>
    </div>
</section>