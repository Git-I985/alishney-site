<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ucwords($page) ?></title>
    <link rel="stylesheet" href="./styles/common.css">
    <link rel="stylesheet" href="./styles/<?= $page ?>.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body>
<header class="header">
    <nav class="header__nav">
        <div class="header__nav__left">
            <a href="./?page=home">
                <div class="header__nav__logo">
                    Alishney Cosmetic Store
                </div>
            </a>
            <div class="header__nav__pages">
                <?php
                $header_pages = ['home' => 'Главная', 'makeup' => 'Косметика', 'contact' => 'Контакты', 'about' => 'О нас'];
                foreach ($header_pages as $site_page => $site_page_name) {
                    $active_page_class = $site_page === $page ? 'header__nav__link__active' : ''
                    ?>
                    <a class="header__nav__link <?= $active_page_class ?>"
                       href="?page=<?= $site_page ?>"><?= $site_page_name ?></a>
                    <?php
                } ?>
            </div>
        </div>
        <div class="header__nav__right">
            <input class="header__nav__search" type="text" placeholder="Поиск по сайту">
            <a class="header__nav__basket" href="./?page=basket" title="Корзина"><i class="fas fa-shopping-cart"></i></a>
            <a class="header__nav__signin" href="#">Вход</a>
        </div>
    </nav>
</header>
<main>