
const setHeaderBasketIconItemsCount = (count) => {
    const headerBasketIconItemsCountBadge  = document.querySelector('.header span.basket-items-count');
    headerBasketIconItemsCountBadge.style.display = count === 0 ? 'none' : 'flex';
    headerBasketIconItemsCountBadge.innerHTML = count;
}

const getHeaderBasketIconItemsCount = () => {
   return parseInt(document.querySelector('.header span.basket-items-count').innerText);
}

const initBurgerMenu = () => {
    document.querySelector('.header-nav-menu-toggler').addEventListener('click', () => {
        document.querySelector('header').classList.toggle('header__mobile')
        document.body.classList.toggle('body-overlay')
    })
}

const commonMain = () => {
    initBurgerMenu()
}

document.addEventListener('DOMContentLoaded', commonMain)