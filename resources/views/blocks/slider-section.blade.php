<section class="section section--slider slider slider--content">
    <div class="container">
        <article class="slider__content">
            <header class="slider__header">
                <h2 class="slider__title">{{ $heading }}</h2>
                <div class="slider__arrows" data-glide-el="controls">
                    <button class="slider__prev" aria-label="{{ __('Previous', 'sage')}}">
                        @svg('images.icons.arrow-left', ['class' => 'slider__icon icon'])
                    </button>
                    <button class="slider__next" aria-label="{{ __('Next', 'sage')}}">
                        @svg('images.icons.arrow-right', ['class' => 'slider__icon icon'])
                    </button>
                </div>
            </header>
            <main class="slider__container">
                <div class="glide">
                    <div class="slider__track glide__track" data-glide-el="track">
                        @if($slider)
                        <ul class="slider__list glide__slides">
                            @foreach ($slider as $slide)
                            @include('components.slide', ['slide' => $slide])
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </main>
        </article>
    </div>
</section>