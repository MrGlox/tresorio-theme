const mix = require("laravel-mix");

require("laravel-mix-criticalcss");

// Public path helper
const publicPath = path => `${mix.config.publicPath}/${path}`;

// Source path helper
const src = path => `resources/assets/${path}`;

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Sage application. By default, we are compiling the Sass file
 | for your application, as well as bundling up your JS files.
 |
 */

// Public Path
mix
  .setPublicPath("./dist")
  .setResourceRoot(`/app/themes/sage/${mix.config.publicPath}/`)
  .webpackConfig({
    output: { publicPath: mix.config.resourceRoot }
  });

// Browsersync
mix.browserSync("tresorio.local");

// Styles
mix.sass(src`styles/editor-style.scss`, "styles");
mix.sass(src`styles/app.scss`, "styles").criticalCss({
  enabled: mix.inProduction(),
  paths: {
    base: "https://tresorio.com/",
    templates: "./dist/styles/",
    suffix: "_critical.min"
  },
  urls: [
    { url: "/", template: "home" },
    { url: "/blog", template: "front-page" }
  ],
  options: {
    minify: true,
    ignore: ["@font-face"],
    dimensions: [
      {
        height: 900,
        width: 420
      },
      {
        height: 900,
        width: 1200
      }
    ]
  }
});

// JavaScript
mix
  .js(src`scripts/app.js`, "scripts")
  .js(src`scripts/customizer.js`, "scripts")
  .extract();

// Assets
mix
  .copyDirectory(src`images`, publicPath`images`)
  .copyDirectory(src`fonts`, publicPath`fonts`);

// Font integration optimisation
mix.copy(src`scripts/async/font-css-async.js`, publicPath`scripts`);

// Autoload
mix.autoload({
  jquery: ["$", "window.jQuery"]
});

// Options
mix.options({
  processCssUrls: false
});

// Source maps when not in production.
mix.sourceMaps(false, "source-map");

// Hash and version files in production.
mix.version();
