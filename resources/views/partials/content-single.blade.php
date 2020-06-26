<div class="container entry">
  <article class="entry__container" @php(post_class())>
    @if(!is_page())
    <header class="entry__header">
      @include('partials/entry-meta')
    </header>
    @endif
    <main class="entry__content">
      @php(the_content())
    </main>
    @if(has_tag())
    <footer class="entry__footer">
      {{ the_tags() }}
    </footer>
    @endif
  </article>
</div>