<footer
  class="footer {{ (is_active_sidebar('footer-newsletter') && !is_page_template('page-legal-notice.blade.php')) ? 'footer--with-newsletter' : '' }}">
  <div class="container">
    @if(!is_page_template('page-legal-notice.blade.php'))
    @php(dynamic_sidebar('footer-newsletter'))
    @endif
    <section class="footer__content">
      <ul class="footer__columns">
        <li class="footer__coords">
          <div class="footer__brand brand">
            @if(isset($brand))
            <a class="brand__link" href="{{ home_url('/') }}">
              <div class="brand__container">
                {!! wp_get_attachment_image($brand, 'logo', false, array('class' => 'brand__logo'))
                !!}
              </div>
            </a>
            @else
            {{ get_bloginfo('name', 'display') }}
            @endif
          </div>
          <div class="footer__coords-content">
            @if(isset($address))
            {!! apply_filters('the_content', $address) !!}
            @endif
          </div>
        </li>
        <li class="footer__links">
          @php(dynamic_sidebar('footer-first'))
        </li>
        <li class="footer__details">
          @php(dynamic_sidebar('footer-second'))
        </li>
        <li class="footer__socials socials">
          <h3 class="socials__title">{{ __('Follow us !', 'sage') }}</h3>
          <ul class="socials__list">
            @if(isset($socials))
            @foreach ($socials as $social)
            <li class="socials__item">
              <a class="socials__link" aria-label="{{ $social['link']['anchor'] }}"
                {{ $social['link']['blank'] ? ' target="_blank" rel="noopener"' : '' }}
                href="{{ $social['link']['url'] }}">
                @svg('images.icons.' . $social['type'], ['class' => 'icon social__icon'])
              </a>
            </li>
            @endforeach
            @endif
          </ul>
        </li>
      </ul>
      <article class="footer__copyright">
        @if(isset($copyright))
        <p>{{ $copyright }}</p>
        @endif
      </article>
    </section>
  </div>
</footer>