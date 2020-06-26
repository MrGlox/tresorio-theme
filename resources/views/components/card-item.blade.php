<article
    class="entries__item card {{ is_front_page() || is_singular('post') || is_page_template('page-product.blade.php') ? 'card--fixed-height' : '' }}"
    data-seo>
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