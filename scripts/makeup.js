// const initBasketItemsCountActions = () => {
//     const basketItems = [ ...document.querySelectorAll('.basket-item') ];
//     basketItems
//         .forEach(basketItem => {
//             const { price: basketItemPrice } = JSON.parse(basketItem.dataset.itemData);
//             basketItem
//                 .querySelectorAll('.basket-item-count-action')
//                 .forEach(basketItemAction => {
//
//                     basketItemAction.addEventListener('click', (e) => {
//                         fetch(actionUrl)
//                             .then((res) => res.json())
//                             .then(console.log)
//                             .catch(console.log)
//
//                         const totalPrice = getTotalPrice();
//                         const basketItemCountContainer = basketItem.querySelector('.basket-item-count-value');
//                         const itemCount = parseInt(basketItemCountContainer.innerText)
//
//                         switch (action) {
//                             case 'add':
//                                 basketItemCountContainer.innerHTML = itemCount + 1;
//                                 setTotalPrice(totalPrice + basketItemPrice)
//                                 setHeaderBasketIconItemsCount(getHeaderBasketIconItemsCount() + 1)
//                                 break;
//                             case 'remove':
//                                 if (itemCount === 1) basketItem.remove()
//                                 else basketItemCountContainer.innerHTML = itemCount - 1;
//                                 setTotalPrice(totalPrice - basketItemPrice)
//                                 setHeaderBasketIconItemsCount(getHeaderBasketIconItemsCount() - 1)
//                                 break;
//                         }
//                     })
//                 })
//         })
// }

const initAddToCartButtons = () => {
    document.querySelectorAll('.makeup-item-card-buy-button').forEach(addToCartButton => {
        addToCartButton.addEventListener('click', () => {
            const actionUrl = addToCartButton.dataset.href;
            const action = actionUrl.split('/').slice(-2, -1)[0]
            console.log(addToCartButton.nextElementSibling)
            const basketItemControls = addToCartButton.nextElementSibling
            basketItemControls.removeAttribute('style')
            addToCartButton.remove()
            fetch(actionUrl)
                .then((res) => res.json())
                .then(console.log)
                .catch(console.log)
        });
    })
}

const main = () => {
    initAddToCartButtons();
}

document.addEventListener('DOMContentLoaded', main)