<?php

if ( ! count($_SESSION['basket'])) { ?>
    <h1 style="text-align: center; margin: 3rem auto; margin-bottom: 1rem">Ваша корзина пуста!</h1>
    <a href="?page=makeup" style="text-align: center; display: block; font-size: 1.3rem; color: var(--color-pink)">Вперед за покупками!</a>
    <?php
    die();
} ?>

<table class="basket-items">
    <thead>
    <tr>
        <td>Изображение</td>
        <td>Наименование</td>
        <td>Описание</td>
        <td>Цена</td>
        <td>Кол-во</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach (array_count_values($_SESSION['basket']) as $item_id => $item_count) {
        global $makeup;
        global $categories;
        $item = getItemById($item_id, $makeup);
        ?>
        <tr class="basket-item" data-item-data='<?= json_encode($item) ?>'>
            <td class="basket-item-img"><img src="<?= $item['img'] ?>"></td>
            <td class="basket-item-name"><?= $item['name'] ?></td>
            <td class="basket-item-description"><?= $item['description'] ?></td>
            <td class="basket-item-price"><?= $item['price'] ?> &#8381;</td>
            <td class="basket-item-count">
                <a class="basket-item-count-action"
                   data-href="./api/basket/remove/<?= $item['id'] ?>">
                    <i class="fas fa-minus"></i>
                </a>
                <div class="basket-item-count-value">
                    <?= $item_count ?>
                </div>
                <a class="basket-item-count-action"
                   data-href="./api/basket/add/<?= $item['id'] ?>">
                    <i class="fas fa-plus"></i>
                </a>
            </td>
        </tr>
        <?php
    } ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="basket-total-price">
            Итог:&nbsp;&nbsp;&nbsp;
            <div class="basket-total-price-value">
                <?php
                $total = 0;
                foreach (array_count_values($_SESSION['basket']) as $item => $count) {
                    $total += getItemById($item, $makeup)['price'] * $count;
                }
                echo $total;
                ?>
            </div>
            <div class="basket-total-price-currency">
                &#8381;
            </div>
        </td>
    </tr>
    </tbody>
</table>
<div class="basket-table-footer">
    <a href="#">Оформить заказ</a>
</div>

