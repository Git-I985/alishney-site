
const setHeaderBasketIconItemsCount = (count) => {
    const headerBasketIconItemsCountBadge  = document.querySelector('.header span.basket-items-count');
    headerBasketIconItemsCountBadge.style.display = count === 0 ? 'none' : 'flex';
    headerBasketIconItemsCountBadge.innerHTML = count;
}

const getHeaderBasketIconItemsCount = () => {
   return parseInt(document.querySelector('.header span.basket-items-count').innerText);
}