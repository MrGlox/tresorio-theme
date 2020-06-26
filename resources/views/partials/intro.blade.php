<section class="section section--intro intro @if(!empty($cta_button)) intro--with-button @endif">
    @svg('images.svg.pattern-intro', ['class' => 'intro__offset'], ['preserveAspectRatio' => 'xMidYMax slice'])
    <div class="container">
        <article class="intro__container">
            @if(function_exists('yoast_breadcrumb'))
            {!! yoast_breadcrumb( '<p class="breadcrumbs" id="breadcrumbs">','</p>' ) !!}
            @endif
            <div class="intro__content">
                @if(!is_page_template('page-legal-notice.blade.php'))
                <h1 class="intro__title">
                    @if(!empty($title))
                    {{ $title }}
                    @else
                    @while(have_posts()) @php(the_post())
                    {{ get_the_title() }}
                    @endwhile
                    @endif
                </h1>
                @else
                <p class="intro__title">
                    @if(!empty($title))
                    {{ $title }}
                    @else
                    @while(have_posts()) @php(the_post())
                    {{ get_the_title() }}
                    @endwhile
                    @endif
                </p>
                @endif
                <div class="intro__text">
                    {!! apply_filters('the_content', $content) !!}
                </div>
                @if(!empty($cta_button))
                <a class="intro__button"
                    href="@if(!empty($cta_button[0]['media'])) {{ $cta_button[0]['media'] }} @else {{ $cta_button[0]['link']['url'] }} @endif"
                    {{ $cta_button[0]['link']['blank'] ? ' target="_blank" rel="noopener"' : '' }}
                    {{ $cta_button[0]['media'] ? ' download' : '' }}>
                    {{ $cta_button[0]['link']['anchor'] }}
                </a>
                @endif
            </div>
        </article>
    </div>
</section>