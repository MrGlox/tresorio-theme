@php
$query = new WP_Query([
'post_type' => 'post',
'posts_per_page' => 3,
'post__not_in' => array($post->ID),
'category__in' => array_map(function($n){return $n['id'];}, $articles),
'ignore_sticky_posts' => 1,
]);
@endphp

<section class="section section--entries entries entries--inline">
    <div class="container">
        <article class="entries__container">
            <header class="entries__header">
                <h2 class="entries__title">{{ $heading }}</h2>
                @if(!empty($content))
                <div class="entries__content">{!! apply_filters('the_content', $content) !!}</div>
                @endif
            </header>
            <main class="entries__main">
                <ul class="entries__list">
                    @if($query->have_posts()) @while ($query->have_posts()) @php $query->the_post() @endphp
                    <article class="entries__item card card--fixed-height" data-seo>
                        <header class="card__media">
                            {!! wp_get_attachment_image(get_post_thumbnail_id(), 'thumbnail-small', false, array('class'
                            => 'card__img')) !!}
                        </header>
                        <main class="card__content">
                            <div class="card__meta">
                                @if(!empty(get_the_category()))
                                <a href="{{ get_primary_taxonomy_term()['url'] }}"
                                    class="card__category">{{ get_primary_taxonomy_term()['title'] }}</a>
                                @endif
                                <span class="card__date">{{ get_the_date('j F Y') }}</span>
                            </div>
                            <h3 class="card__title">
                                {{ the_title() }}
                            </h3>
                            <a class="card__link" aria-label="{{ the_title() }}" href="{{ get_permalink() }}">
                                @svg('images.icons.arrow-right-large', ['class' => 'icon card__icon'])
                            </a>
                        </main>
                    </article>
                    @endwhile @endif @php wp_reset_postdata(); @endphp
                </ul>
            </main>
            <footer class="entries__footer">
                <a class="entries__button" href="{{ get_permalink(get_option('page_for_posts')) }}">
                    {{ __('See all articles', 'sage') }}
                </a>
            </footer>
        </article>
    </div>
</section>