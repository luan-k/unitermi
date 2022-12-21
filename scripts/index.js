import "../styles/index.scss";
import $ from "jquery";
import "./modules/animation/animations.js";
import "./modules/animation/anime.js";
import "./modules/navbar";
import "./modules/sticky-scroll";
import "./modules/accordion";
import "./modules/counter";
import "slick-carousel";
import "./modules/slick-config/product-slider";
import Search from "./modules/Search";

var search = new Search();

$(function () {
	$(".toggler").on("click", function () {
		$("nav.nav-menu").slideToggle(500);
	});
});

let resetAllText = document.getElementsByClassName("wpc-filter-chip-name")[0];
if (resetAllText.innerHTML == "Reset all") {
	resetAllText.innerHTML = "Limpar filtros";
} else {
	console.log("no");
}
console.log(resetAllText);
