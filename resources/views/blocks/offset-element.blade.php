<section class="offset @if($offset_right) offset--right @endif">
    <div class="container">
        <article class="offset__media">
            {!! wp_get_attachment_image($main_image, 'auto', false, array('class' =>
            'offset__img')) !!}
        </article>
    </div>
</section>