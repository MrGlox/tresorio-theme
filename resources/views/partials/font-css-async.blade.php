<script>
  // inline loadJS
    function loadJS(e,t){"use strict";var n=window.document.getElementsByTagName("script")[0],o=window.document.createElement("script");return o.src=e,o.async=!0,n.parentNode.insertBefore(o,n),t&&"function"==typeof t&&(o.onload=t),o}
    // then load your JS
    if (sessionStorage.getItem('fonts-loaded')) {
      // fonts cached, add class to document
      document.documentElement.classList.remove('fonts-loading');
    } else {
      // load script with font observing logic
      loadJS("{!! get_theme_file_uri('/dist/scripts/font-css-async.js') !!}");
    }
</script>

{{-- {!! get_theme_file_uri('/dist/scripts/font-css-async.js') !!}
{{ get_template_directory_uri() . '/dist/scripts/font-css-async.js' }} --}}