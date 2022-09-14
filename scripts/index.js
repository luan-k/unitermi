import "../styles/index.scss";
import $ from "jquery";
import "./modules/animation/animations.js";
import "./modules/animation/anime.js";
import "./modules/accordion";
import Search from "./modules/Search";

var search = new Search();

$(function() {
	$('.toggler').on('click', function() {
		$('nav.nav-menu').slideToggle(500);
  });
});
