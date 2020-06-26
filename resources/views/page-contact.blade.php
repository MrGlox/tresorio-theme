{{--
  Template Name: Contact template
--}}

@extends('layouts.app')

{{-- @section('header')
@include('partials.contact-header')
@endsection --}}

@section('content')
<section class="contact__inner">
    <article class="contact__map">
        @include('partials.map')
    </article>
    <article class="contact__content">
        <div class="container">
            @while(have_posts()) @php(the_post())
            <header class="contact__header">
                <h1 class="contact__title">{{ the_title() }}</h1>
            </header>
            <main class="contact__main">
                {{ the_content() }}
            </main>
            @endwhile
        </div>
    </article>
</section>
@endsection

@section('footer')
@include('partials.contact-footer')
@endsection