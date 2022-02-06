<?php


$filter_category_id = null;

if (isset($_GET['filter_category_id'])) {
    $filter_category_id = (int)$_GET['filter_category_id'];
    $makeup             = array_filter($makeup, function ($item) use ($filter_category_id) {
        return $item['category_id'] === $filter_category_id;
    });
};

session_start();

?>

<div class="page-header">
    <div class="page-header-banner">
        <h1>Идеальное лицо начинается с <br> безупречного тонального крема.</h1>
    </div>
    <div class="items-filters">
        <a class="<?= ! $filter_category_id ? 'active-filter' : '' ?>" href="?page=makeup">Все товары</a>
        <?php
        foreach ($categories as $category) {
            $active_class = $filter_category_id ? $category['id'] === $filter_category_id ? 'active-filter' : '' : '';
            ?>
            <a class="<?= $active_class ?>"
               href="?page=makeup&filter_category_id=<?= $category['id'] ?>"><?= $category['name'] ?></a>
            <?php
        } ?>
    </div>
</div>

<div class="makeup-cards">
    <?php
    foreach ($makeup as $item) {
        $item_in_basket       = in_array($item['id'], $_SESSION['basket']);
        $buy_button_class     = $item_in_basket ? 'active' : '';
        $buy_button_url       = $item_in_basket ? "?page=basket" : "?page=basket_manager&action=add&item_id={$item['id']}";
        $item_count_in_basket = array_count_values($_SESSION['basket'])[$item['id']] ?? 1;
        ?>
        <div class="makeup-item-card" data-item-id="<?= $item['id'] ?>">
            <div class="makeup-item-card-img">
                <img src="<?= $item["img"] ?>" alt="<?= $item["name"] ?>">
            </div>
            <div class="makeup-item-card-content">
                <p class="makeup-item-card-name"><?= $item["name"] ?></p>
                <p class="makeup-item-card-description"><?= $item["description"] ?></p>
                <p class="makeup-item-card-rating" title="Рейтинг продукта">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        $class = $i <= $item['rating'] ? 'fas fa-star' : 'far fa-star';
                        echo "<i class='{$class}'></i>";
                    }
                    ?>
                </p>
                <p class="makeup-item-card-price"><?= $item["price"] ?> &#8381;</p>
                <a class="makeup-item-card-buy-button"
                   data-href="./api/basket/add/<?= $item['id'] ?>"
                   style="display: <?= $item_in_basket ? 'none' : 'block' ?>"
                >В корзину</a>
                <div class="makeup-item-card-already-in-basket-controls"
                     style="display: <?= $item_in_basket ? 'flex' : 'none' ?>">
                    <a class="basket-item-count-action"
                       data-href="./api/basket/remove/<?= $item['id'] ?>">
                        <i class="fas fa-minus"></i>
                    </a>
                    <div class="basket-item-count-value"><?= $item_count_in_basket ?></div>
                    <a class="basket-item-count-action"
                       data-href="./api/basket/add/<?= $item['id'] ?>">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php
    } ?>

</div>