<section class="section section--slider slider slider--logo">
    <div class="container container--larger">
        <article class="slider__content">
            <header class="slider__header">
                <h2 class="slider__title">{{ $title }}</h2>
            </header>
            <main class="slider__container">
                <div class="glide">
                    <div class="slider__track glide__track" data-glide-el="track">
                        @if($logos)
                        <ul class="slider__list glide__slides">
                            @foreach ($logos as $logo)
                            @include('components.logo-slide', ['slide' => $logo])
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="slider__arrows glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left slider__prev"
                        aria-label="{{__('Previous', 'sage') }}">
                        @svg('images.icons.prev-large', ['class' => 'slider__icon icon'])
                    </button>
                    <button class="glide__arrow glide__arrow--right slider__next" aria-label="{{__('Next', 'sage') }}">
                        @svg('images.icons.next-large', ['class' => 'slider__icon icon'])
                    </button>
                </div>
            </main>
        </article>
    </div>
</section>