@extends('layouts.empty')

@section('content')
@svg('images.svg.artefacts', ['class' => 'content__artefacts'], ['preserveAspectRatio' => 'xMidYMax slice'])
<header class="header header--custom">
  <div class="container">
    <div class="brand">
      <a class="brand__link" href="{{ home_url('/') }}">
        <div class="brand__container">
          {!! wp_get_attachment_image($brand['logo'], 'vertical', false, array('class' =>
          'brand__logo'))
          !!}
        </div>
      </a>
    </div>
  </div>
</header>
<main class="content">
  <div class="container">
    <section class="content__container">
      <h1 class="content__title">
        {{ $title }}
      </h1>
      <ul class="content__list content__list--inline">
        <li class="content__item">
          <a class="content__link" href="{{ get_home_url() }}">{{ __('Back to home', 'sage') }}</a>
        </li>
        <li class="content__item">
          <a class="content__link content__link--second"
            href="{{ get_permalink( get_option( 'page_for_posts' )) }}">{{ __('See blog', 'sage') }}</a>
        </li>
      </ul>
      <div class="content__media">
        @svg('images.svg.404', ['class' => 'content__img'])
      </div>
    </section>
  </div>
</main>
@endsection