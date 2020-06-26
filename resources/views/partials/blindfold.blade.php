@if($blindfold)
<div id="blindfold" class="blindfold">
    <div class="container blindfold__container">
        <div class="blindfold__content">
            <div class="blindfold__text">{!! apply_filters('the_content', $blindfold) !!}</div>
            <a class="blindfold__link" href="{{ $blindfold_link['url'] }}"
                {{ $blindfold_link['blank'] ? ' target="_blank" rel="noopener"' : '' }}>
                {{ $blindfold_link['anchor'] }}
            </a>
        </div>
        <button class="blindfold__close" aria-label="{{ __("Close beta test banner", "sage")}}">
            @svg('images.icons.close', ['class' => 'blindfold__icon icon'])
        </button>
    </div>
</div>
@endif