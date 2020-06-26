/**
 * External Dependencies
 */
import { router } from "js-dom-router";

import "./polyfill/forEach";
import "./polyfill/pictureFill";
import "./polyfill/objectFit";

/**
 * Plugins integration
 */
import "./src/facet-wp";

/**
 * Global integration
 */
import "./src/logo-slider";
import "./src/svg-player";
import "./src/lazyload";

import "./src/input-interact";
import "./src/menu";
import "./src/seo";
import "./src/slider";
import "./src/blindfold-with-sticky";
import "./src/scroll-to";
import "./src/responsive-tabs";
import "./src/rendering-animation";
import "./src/server-animation";

/**
 * DOM-based routing
 */
import contact from "./routes/contact";

/**
 * Below is an example of a dynamic import; it will not be loaded until it's needed.
 *
 * See: {@link https://webpack.js.org/guides/code-splitting/#dynamic-imports | Dynamic Imports}
 */
// const home = async () =>
//   import(/* webpackChunkName: "scripts/routes/home" */ "./routes/home");

/**
 * Set up DOM router
 *
 * .on(<name of body class>, callback)
 *
 * See: {@link http://goo.gl/EUTi53 | Markup-based Unobtrusive Comprehensive DOM-ready Execution} by Paul Irish
 */
router
  .on("contact", contact)
  // .on("home", async event => (await home()).default(event))
  .ready();
