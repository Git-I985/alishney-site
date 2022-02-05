<?php

$categories = [
    ["id" => 1, "name" => "Губы"],
    ["id" => 2, "name" => "Глаза"],
    ["id" => 3, "name" => "Кисти"],
    ["id" => 4, "name" => "Палетки"],
    ["id" => 5, "name" => "Лицо"],
];

$makeup = [
    [
        "id"          => 1,
        "name"        => "Givenchy",
        "img"         => "./images/6.png",
        "description" => "Бальзам для губ Le Rose Perfecto от Givenchy",
        "rating"      => 5,
        "price"       => "1 999",
        "category_id"    => 1,
    ],
    [
        "id"          => 2,
        "name"        => "Revolution Makeup",
        "img"         => "./images/7.png",
        "description" => "REVOLUTION x Rachel Leary Палетка Goddess on the go",
        "rating"      => 5,
        "price"       => "1 105",
        "category_id"    => 4,
    ],
    [
        "id"          => 3,
        "name"        => "Too Faced",
        "img"         => "./images/8.jpg",
        "description" => "Diamond light хайлайтер",
        "rating"      => 4,
        "price"       => "3 890",
        "category_id"    => 5,
    ],
    [
        "id"          => 4,
        "name"        => "Lancôme",
        "img"         => "./images/9.jpg",
        "description" => "Hypnose Volume-а-Porter тушь для ресниц",
        "rating"      => 5,
        "price"       => "3 070",
        "category_id"    => 2,
    ],
    [
        "id"          => 5,
        "name"        => "Shiseido",
        "img"         => "./images/10.jpg",
        "description" => "Shiseido Synchro Skin Glow Тональное средство-флюид с эффектом естественного сияния",
        "rating"      => 3,
        "price"       => "4 100",
        "category_id"    => 5,
    ],
    [
        "id"          => 6,
        "name"        => "Clarins",
        "img"         => "./images/11.jpg",
        "description" => "Clarins Ever Matte Матирующая рассыпчатая пудра",
        "rating"      => 5,
        "price"       => "3 700",
        "category_id"    => 5,
    ],
    [
        "id"          => 7,
        "name"        => "Urban Decay",
        "img"         => "./images/12.jpg",
        "description" => "Urban Decay Naked 3 Палетка теней для век",
        "rating"      => 5,
        "price"       => "5 380",
        "category_id"    => 2,
    ],
];
$filter_category_id = null;
if(isset($_GET['filter_category_id'])) {
    $filter_category_id = (int) $_GET['filter_category_id'];
    $makeup = array_filter($makeup, function ($item) use ($filter_category_id) {
        return $item['category_id'] === $filter_category_id;
    });
};
?>

<div class="page-header">
    <div class="page-header-banner">
        <h1>Идеальное лицо начинается с <br> безупречного тонального крема.</h1>
    </div>
    <div class="items-filters">
        <a class="<?= !$filter_category_id ? 'active-filter' : '' ?>" href="?page=makeup">Все товары</a>
        <?php
            foreach ($categories as $category) {
            $active_class = $filter_category_id ? $category['id'] === $filter_category_id ? 'active-filter' : '' : '';
        ?>
            <a class="<?= $active_class ?>" href="?page=makeup&filter_category_id=<?= $category['id'] ?>"><?= $category['name'] ?></a>
        <?php } ?>
    </div>
</div>

<div class="makeup-cards">
    <?php
    foreach ($makeup as $item) { ?>
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
                <a class="makeup-item-card-buy-button" href="#">В корзину</a>
            </div>
        </div>
    <?php
    } ?>

</div>