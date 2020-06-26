{{--
  Template Name: Article template
--}}

@extends('layouts.app')

@section('content')
@include('partials.single-intro')
<section class="page__content">
    @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-single-'.get_post_type(), 'partials.content-single'])
    @endwhile
    @include('partials.short-archive')
</section>
@endsection