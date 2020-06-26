<li class="timeline__item @if($loop->last) timeline__item--last @endif">
    @if ($loop->last)
    @svg('images.svg.timeline-item-last', ['class' => 'timeline__item-stroke'], ['preserveAspectRatio' => 'none'])
    @else
    @svg('images.svg.timeline-item', ['class' => 'timeline__item-stroke'], ['preserveAspectRatio' => 'none'])
    @endif
    <h3 class="timeline__item-title">{{ $item['year'] }}</h3>
    <ul class="timeline__sublist">
        @foreach ($item['list'] as $sub_item)
        @include('components.timeline-subitem', ['sub_item' => $sub_item])
        @endforeach
    </ul>
</li>