
let multi_menus = document.querySelectorAll(' li.menu-item.menu-item-has-children ');

for( let i = 0; i < multi_menus.length; i++ ) {

    let menu = multi_menus[i]
    let el = document.createElement('div');
    
    el.classList.add('collapser');

    menu.insertBefore(el, menu.children[1]);

    let collapser = menu.querySelector('.collapser');

    collapser.addEventListener('click', () => {
        if(menu.classList.contains('active')) {
            menu.classList.remove('active')
        }
        else {
            menu.classList.add('active')
        }
    })
}