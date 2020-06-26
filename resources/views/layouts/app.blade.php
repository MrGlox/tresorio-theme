<!doctype html>
<html {!! get_language_attributes() !!}>
@include('partials.head')

<body @section('body_class') @php(body_class('no-js fonts-loading')) @show>
  @php(wp_body_open())
  <ul class="menu-fastaccess">
    <li class="menu-fastaccess__item"><a href="#main__content">Acces direct au contenu</a></li>
    <li class="menu-fastaccess__item"><a href="#menu">Acces direct au menu</a></li>
  </ul>
  @php(do_action('get_header'))

  @include('partials.blindfold')

  <main id="main__content" class="wrap">
    @section('header')
    @include('partials.header')
    @show

    @yield('content')

    @hasSection('sidebar')
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
    @endif
  </main>

  @php(do_action('get_footer'))

  @section('footer')
  @include('partials.footer')
  @show

  @php(wp_footer())
  @include('partials.font-css-async')
</body>

</html>