<section class="section section--intro intro intro--blog">
    @svg('images.svg.pattern-small-bg', ['class' => 'intro__offset'], ['preserveAspectRatio' => 'xMidYMax slice'])
    <div class="container">
        <article class="intro__container">
            @if(function_exists('yoast_breadcrumb'))
            {!! yoast_breadcrumb( '<p class="breadcrumbs" id="breadcrumbs">','</p>' ) !!}
            @endif
            <div class="intro__content">
                <h1 class="intro__title">
                    {{ single_post_title() }}
                </h1>
                <div class="intro__text">
                    {!! apply_filters('the_content', get_queried_object()->post_content) !!}
                </div>
            </div>
        </article>
    </div>
</section>