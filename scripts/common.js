
const setHeaderBasketIconItemsCount = (count) => {
    const headerBasketIconItemsCountBadge  = document.querySelector('.header span.basket-items-count');
    if(count === 0) return headerBasketIconItemsCountBadge.remove()
    headerBasketIconItemsCountBadge.innerHTML = count;
}

const getHeaderBasketIconItemsCount = () => {
   return parseInt(document.querySelector('.header span.basket-items-count').innerText);
}