<div class="socials">
    @if(isset($socials))
    <ul class="socials__list">
        @foreach ($socials as $social)
        <li class="socials__item">
            <a class="socials__link" aria-label="{{ $social['link']['anchor'] }}"
                {{ $social['link']['blank'] ? ' target="_blank" rel="noopener"' : '' }}
                href="{{ $social['link']['url'] }}">
                @svg('images.icons.' . $social['type'], ['class' => 'icon social__icon'])
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</div>