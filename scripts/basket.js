getTotalPrice = () => {
    const totalPriceContainer = document.querySelector('.basket-total-price-value')
    return parseFloat(totalPriceContainer.innerHTML)
}

setTotalPrice = (price) => {
    document.querySelector('.basket-total-price-value').innerHTML = price;
}

const initBasketItemsCountActions = () => {
    const basketItems = [ ...document.querySelectorAll('.basket-item') ];
    basketItems
        .forEach(basketItem => {
            const { price: basketItemPrice } = JSON.parse(basketItem.dataset.itemData);
            basketItem
                .querySelectorAll('.basket-item-count-action')
                .forEach(basketItemAction => {
                    const actionUrl = basketItemAction.dataset.href;
                    const action = actionUrl.split('/').slice(-2, -1)[0]

                    basketItemAction.addEventListener('click', (e) => {
                        fetch(actionUrl)
                            .then((res) => res.json())
                            .then(console.log)
                            .catch(console.log)

                        const totalPrice = getTotalPrice();
                        const basketItemCountContainer = basketItem.querySelector('.basket-item-count-value');
                        const itemCount = parseInt(basketItemCountContainer.innerText)

                        switch (action) {
                            case 'add':
                                basketItemCountContainer.innerHTML = itemCount + 1;
                                setTotalPrice(totalPrice + basketItemPrice)
                                setHeaderBasketIconItemsCount(getHeaderBasketIconItemsCount() + 1)
                                break;
                            case 'remove':
                                if (itemCount === 1) basketItem.remove()
                                else basketItemCountContainer.innerHTML = itemCount - 1;
                                setTotalPrice(totalPrice - basketItemPrice)
                                setHeaderBasketIconItemsCount(getHeaderBasketIconItemsCount() - 1)
                                break;
                        }

                        if(document.querySelectorAll('table tbody tr').length < 2) {
                            window.location.href = '?page=makeup'
                        }

                    })
                })
        })
}

const main = () => {
    initBasketItemsCountActions()
}

document.addEventListener('DOMContentLoaded', main)