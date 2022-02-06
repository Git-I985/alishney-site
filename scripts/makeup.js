const toggleAddToCartControls = (makeupItemId) => {
    const itemCard = [ ...document.querySelectorAll('.makeup-item-card') ].find((makeupItemCard) => {
        return makeupItemCard.dataset.itemId === makeupItemId
    })
    const buyButton = itemCard.querySelector('.makeup-item-card-buy-button')
    buyButton.style.display = buyButton.style.display === 'block' ? 'none' : 'block'
    const controls = itemCard.querySelector('.makeup-item-card-already-in-basket-controls')
    controls.style.display = controls.style.display === 'flex' ? 'none' : 'flex'
}

const initCardsItemsCountControls = () => {
    const countControls = [ ...document.querySelectorAll('.makeup-item-card-already-in-basket-controls') ];
    countControls.forEach(countControlsContainer => {
        countControlsContainer
            .querySelectorAll('.basket-item-count-action')
            .forEach(basketItemAction => {
                const actionUrl = basketItemAction.dataset.href;
                const [ action, itemId ] = actionUrl.split('/').slice(-2)

                basketItemAction.addEventListener('click', (e) => {
                    fetch(actionUrl)
                        .then((res) => res.json())
                        .then(console.log)
                        .catch(console.log)

                    const itemCountContainer = countControlsContainer.querySelector('.basket-item-count-value');
                    const itemCount = parseInt(itemCountContainer.innerText)

                    switch (action) {
                        case 'add':
                            itemCountContainer.innerHTML = itemCount + 1;
                            setHeaderBasketIconItemsCount(getHeaderBasketIconItemsCount() + 1)
                            break;
                        case 'remove':
                            if(itemCount === 1) toggleAddToCartControls(itemId)
                            else itemCountContainer.innerHTML = itemCount - 1;
                            setHeaderBasketIconItemsCount(getHeaderBasketIconItemsCount() - 1)
                            break;
                    }
                })
            })
    });
}

const initAddToCartButtons = () => {
    document.querySelectorAll('.makeup-item-card-buy-button').forEach(addToCartButton => {
        addToCartButton.addEventListener('click', () => {
            const actionUrl = addToCartButton.dataset.href;
            const [ action, itemId ] = actionUrl.split('/').slice(-2)
            toggleAddToCartControls(itemId)
            setHeaderBasketIconItemsCount(getHeaderBasketIconItemsCount() + 1)
            fetch(actionUrl)
                .then((res) => res.json())
                .then(console.log)
                .catch(console.log)
        });
    })
}

const main = () => {
    initAddToCartButtons();
    initCardsItemsCountControls();
}

document.addEventListener('DOMContentLoaded', main)