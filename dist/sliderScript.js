jQuery(document).ready((function(e){e(document).ready((function(){window.addEventListener("load",(function(){linkst=document.getElementsByTagName("a")[15],linksn=document.getElementsByTagName("a")[16],linkrd=document.getElementsByTagName("a")[17],linkrth=document.getElementsByTagName("a")[18],nextBtn=document.getElementsByClassName("next half"),linkst.classList.add("click-link-style"),linksn.classList.add("click-link-style"),linkrd.classList.add("click-link-style"),linkrth.classList.add("click-link-style"),linkst.removeAttribute("href"),linksn.removeAttribute("href"),linkrd.removeAttribute("href"),linkrth.removeAttribute("href");var e=[linkst,linksn,linkrd,linkrth];setInterval((function(){for(i=0;i<e.length;i++)if(e[i].classList.contains("selected"))return void(e[i+1]?e[i+1].click():e[0].click())}),6e3)}))}))}));
//# sourceMappingURL=sliderScript.js.map