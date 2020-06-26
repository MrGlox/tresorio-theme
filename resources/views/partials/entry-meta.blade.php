<div class="entry__meta">
  @if(!empty(get_the_category()))
  <a class="entry__category"
    href="{{ get_permalink( get_option( 'page_for_posts' ) ) }}?_categories={{ get_primary_taxonomy_term()['slug'] }}"
    class="card__category">{{ get_primary_taxonomy_term()['title'] }}</a>
  @endif

  <time class="entry__date updated" datetime="{{ get_post_time('c', true) }}">
    {{ __('Posted on', 'sage') }} {{ get_the_date() }}
  </time>

  {{-- <p class="entry__author byline author vcard">
    <span>{{ __('Written by', 'sage') }}</span>
  <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
    {{ get_the_author() }}
  </a>
  </p> --}}
</div>