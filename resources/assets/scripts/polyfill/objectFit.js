/* global Modernizr */
import "../vendors/modernizr.objectfit";
import objectFitImages from "object-fit-images";

if (!Modernizr.objectfit) {
  objectFitImages();
}
