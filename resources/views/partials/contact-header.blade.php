<header class="header header--fixed">
    <div class="container container--small">
        <section class="header__content">
            <div class="brand">
                <a class="brand__link" href="{{ home_url('/') }}">
                    @if(isset($brand))
                    <div class="brand__container">
                        {!! wp_get_attachment_image($brand['logo'], 'vertical', false, array('loading' => 'lazy',
                        'class' =>
                        'brand__logo')) !!}
                    </div>
                    @else
                    {{ get_bloginfo('name', 'display') }}
                    @endif
                </a>
            </div>
            <nav class="header__menu menu">
                @if (has_nav_menu('primary_navigation'))
                @include('partials.navigation')
                @endif
                <div class="menu__cta">
                    @if (has_nav_menu('utilities_navigation'))
                    @include('partials.cta')
                    @endif
                    @php(dynamic_sidebar('header'))
                </div>
            </nav>
        </section>
    </div>
</header>