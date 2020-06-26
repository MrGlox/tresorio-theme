<li class="timeline__subitem">
    @svg('images.svg.timeline-subitem', ['class' => 'timeline__subitem-stroke'])
    <h4 class="timeline__subitem-title">{{ $sub_item['date'] }}</h4>
    <div class="timeline__subitem-content">{!! apply_filters('the_content', $sub_item['content']) !!}</div>
</li>