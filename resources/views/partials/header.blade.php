<div id="js-menu-trigger" class="menu-trigger" data-sticky-class="menu-trigger--sticky">
  <button type="button" id="js-menu-open" class="menu-trigger__open" aria-label="{{ __('Open menu', 'sage')}}">
    @svg('images.icons.border', ['class' => 'menu-trigger__border'])
    @svg('images.icons.burger', 'icon icon-menu menu-trigger__icon')
  </button>
  <button type="button" id="js-menu-close" class="menu-trigger__close" aria-label="{{ __('Close menu', 'sage')}}">
    @svg('images.icons.border', ['class' => 'menu-trigger__border'])
    @svg('images.icons.burger-close', 'icon icon-menu menu-trigger__icon')
  </button>
</div>

<header class="header" data-sticky-class="header--sticky">
  <div class="container container--small">
    <section class="header__content">
      <div class="brand">
        <a class="brand__link" href="{{ home_url('/') }}">
          @if(isset($brand))
          <div class="brand__container">
            {!! wp_get_attachment_image($brand['logo'], 'vertical', false, array('class' =>
            'brand__logo'))
            !!}
            {!! wp_get_attachment_image($brand['logo_light'], 'vertical', false, array('class' =>
            'brand__logo
            brand__logo--light')) !!}
          </div>
          @else
          {{ get_bloginfo('name', 'display') }}
          @endif
        </a>
      </div>
      <nav class="header__menu menu">
        <div class="container">
          @if (has_nav_menu('primary_navigation'))
          @include('partials.navigation')
          @endif
          <div class="menu__cta">
            @if (has_nav_menu('utilities_navigation'))
            @include('partials.cta')
            @endif
            @php(dynamic_sidebar('header'))
          </div>
        </div>
      </nav>
    </section>
  </div>
</header>