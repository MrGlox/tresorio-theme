{{--
  Template Name: About template
--}}

@extends('layouts.app')

@section('content')
@include('partials.intro')
<section class="content">
  <div class="content__inner">
    @while(have_posts()) @php(the_post())
    {{ the_content() }}
    @endwhile
  </div>
</section>
@endsection