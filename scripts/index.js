import "../styles/index.scss";
import $ from "jquery";
import "./modules/animation/animations.js";
import "./modules/animation/anime.js";
import "./modules/navbar";
import "./modules/accordion";
import "slick-carousel";
import "./modules/slick-config/product-slider";
import Search from "./modules/Search";

var search = new Search();

$(function() {
	$('.toggler').on('click', function() {
		$('nav.nav-menu').slideToggle(500);
  });
});

$(function() {
	console.log($('.woocommerce-breadcrumb > a'));
	let links = $('.woocommerce-breadcrumb > a');
	for( let i = 0; i < links.length; i++){
		links[i].removeAttribute("href");
	}
});

