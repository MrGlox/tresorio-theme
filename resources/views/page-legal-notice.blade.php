{{--
  Template Name: Legal notice template
--}}

@extends('layouts.app')

@section('content')
@include('partials.intro')
<section class="content">
    <div class="container entry">
        <div class="content__inner entry__content">
            @while(have_posts()) @php(the_post())
            <h1 class="content__title">
                {{ the_title() }}
            </h1>
            {{ the_content() }}
            @endwhile
        </div>
    </div>
</section>
@endsection