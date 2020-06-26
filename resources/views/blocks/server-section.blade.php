<section class="section section--server server">
  <div class="container server__container">
    <article class="server__content">
      <div class="server__block">
        <header class="server__header">
          <h2 class="server__title">{{ $title }}</h2>
          <div class="server__text">
            {!! apply_filters('the_content', $content) !!}
          </div>
        </header>
        <main class="server__main">
          <h3 class="server__title server__title--sub">{{ $sub_title }}</h3>
          <form class="js-server-form" action="#">
            <div class="range__container">
              <label class="range__label range__label--small" for="cpu">{{ __('vCPU (AMD EPYC)', 'sage') }}</label>
              <input id="cpu" name="cpu" type="range" min="4" max="32" value="6" step="1" class="range">
            </div>
            <div class="range__container">
              <label class="range__label range__label--small" for="ram">{{ __('RAM (GB)', 'sage') }}</label>
              <input id="ram" name="ram" type="range" min="4" max="128" value="16" step="4" class="range">
            </div>
            <div class="range__container">
              <label class="range__label range__label--small" for="storage">{{ __('SSD STORAGE (GB)', 'sage') }}</label>
              <input id="storage" name="storage" type="range" min="50" max="4000" value="50" step="25" class="range">
            </div>
            <div class="range__container">
              <label class="range__label" for="gpu">{{ __('GPU (Nvidia RTX 4000)', 'sage') }}</label>
              <input id="gpu" name="gpu" type="range" min="0" max="4" value="0" step="1" class="range">
            </div>
          </form>
        </main>
        <footer class="server__footer">
          <div class="switch">
            <h3 class="switch__title">{{ __('Switch price by hour or month', 'sage') }}</h3>
            <label class="switch__label">
              <input id="storageType" type="checkbox" class="switch__input" name="storageType">
              <div class="switch__container">
                <div class="switch__slider">
                  <span class="switch__span">{{ __('month', 'sage') }}</span>
                  <div class="switch__pointer"></div>
                  <span class="switch__span">{{  __('hour', 'sage') }}</span>
                </div>
              </div>
            </label>
          </div>
          <p class="server__price">
            <span class="server__value js-server-price">
              0.16<span class="server__currency">{{ __('€', 'sage') }}</span>
            </span>
            /<span class="server__price-month">{{ __('month', 'sage') }}</span>
            <span class="server__price-hour">{{ __('hour', 'sage') }}</span>
          </p>
          <a class="server__link" href="{{ $link['url'] }}"
            {{  $link['blank'] ? ' target="_blank" rel="noopener"' : '' }}>
            {{ $link['anchor'] }}
          </a>
        </footer>
      </div>
      <aside class="server__aside illustration illustration--large">
        @svg('images.svg.server', ['class' => 'server__media illustration__container server-animation'])
      </aside>
    </article>
  </div>
</section>