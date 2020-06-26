{{--
  Template Name: Press template
--}}

@extends('layouts.app')

@section('content')
@include('partials.intro')
<div class="page__content">
  <div class="container">
    @while(have_posts()) @php(the_post())
    {{ the_content() }}
    @endwhile
  </div>
</div>
@endsection