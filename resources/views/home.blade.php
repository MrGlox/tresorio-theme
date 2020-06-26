@php
if(!function_exists('facetwp_display')){
$query = new WP_Query([
'post_type' => 'post',
'posts_per_page' => 8,
'ignore_sticky_posts' => 1,
]);
}
@endphp

@extends('layouts.app')

@section('body_class') @php body_class('template-blog') @endphp @endsection

@section('content')
@include('partials.intro-blog')
<div class="page__content">
  @svg('images.svg.hexa_bg', ['class' => 'page__hexa'])
  <div class="container entries entries--masonry entries--facetwp facetwp">
    <article class="page__inner entries__container">
      <header class="entries__header">
        <h2 class="entries__title entries__title--left">{{ __('News', 'sage') }}</h2>
        @if(function_exists('facetwp_display'))
        {!! facetwp_display( 'facet', 'categories') !!}
        @endif
      </header>
      <main class="entries__main">
        <section class="entries__list">
          @if(function_exists('facetwp_display'))
          {!! facetwp_display( 'template', 'blog' ) !!}
          @else
          @if(have_posts()) @php $i = 1; @endphp
          @while ($query->have_posts()) @php $query->the_post() @endphp
          @if($i === 3)
          @include('components.card-cta')
          @endif
          @include('components.card-item')
          @php $i++ @endphp
          @endwhile @endif @php wp_reset_postdata(); @endphp
          @endif
        </section>
      </main>
      <footer class="entries__footer">
        @if(function_exists('facetwp_display'))
        {!! facetwp_display('pager', 'main_pager') !!}
        @endif
      </footer>
    </article>
  </div>
</div>
@endsection