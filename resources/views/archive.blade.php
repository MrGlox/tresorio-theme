{{--
  Template Name: Archives template
--}}

@extends('layouts.app')

@section('content')
@include('partials.intro-blog')
<div class="page__content">
  @svg('images.svg.hexa_bg', ['class' => 'page__hexa'])
  <div class="container entries entries--facetwp facetwp">
    <article class="page__inner entries__container">
      <header class="entries__header">
        <h2 class="entries__title entries__title--left">{{ __('News', 'sage') }}</h2>
      </header>
      <main class="entries__main">
        <div class="entries__list">
          @if (have_posts())
          @while (have_posts()) @php(the_post())
          @include('components.card-item')
          @endwhile
          @else
          <p>{{ __('Sorry, no posts matched your criteria.', 'sage') }}</p>
          @endif
        </div>
      </main>
    </article>
  </div>
</div>
@endsection