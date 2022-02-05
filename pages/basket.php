<?php

if ( ! count($_SESSION['basket'])) { ?>
    <h1>Ваша корзина пуста!</h1>
    <a href="?page=makeup">Вперед за покупками!</a>
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
        <tr>
            <td class="basket-item-img"><img src="<?= $item['img'] ?>"></td>
            <td class="basket-item-name"><?= $item['name'] ?></td>
            <td class="basket-item-description"><?= $item['description'] ?></td>
            <td class="basket-item-price"><?= $item['price'] * $item_count ?> &#8381;</td>
            <td class="basket-item-count">
                <a class="basket-item-count-action"
                   href="?page=basket_manager&action=remove&item_id=<?= $item['id'] ?>">
                    <i class="fas fa-minus"></i>
                </a>
                <div class="basket-item-count-value">
                    <?= $item_count ?>
                </div>
                <a class="basket-item-count-action" href="?page=basket_manager&action=add&item_id=<?= $item['id'] ?>">
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
        <td>Итог: </td>
        <td><?php
            $total = 0;
            foreach (array_count_values($_SESSION['basket']) as $item => $count) {
                $total += getItemById($item_id, $makeup)['price'] * $count;
            }
            echo $total;
            ?> &#8381;</td>
    </tr>
    </tbody>
</table>
<div class="basket-table-footer">
    <a href="#">Оформить заказ</a>
</div>

