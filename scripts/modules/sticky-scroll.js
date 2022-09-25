import throttle from './throttle.js'

window.onload = function WindowLoad ( event ) {

  window.addEventListener( 'scroll', throttle(scrollFunction, 200) );
  let header = document.querySelectorAll("header.header")[0];
  let headerHeight = header.offsetHeight

  function scrollFunction() {
    if (document.body.scrollTop > headerHeight || document.documentElement.scrollTop > headerHeight) {
      header.classList.add('header--sm');
    }else if (document.body.scrollTop < headerHeight || document.documentElement.scrollTop < headerHeight){
      header.classList.remove('header--sm');
    }
     else {
      header.classList.remove('header--sm');
    }
  }
}
