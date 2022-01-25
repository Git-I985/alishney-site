<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ucwords($page) ?></title>
    <link rel="stylesheet" href="../styles/common.css">
    <link rel="stylesheet" href="../styles/<?= $page ?>.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body>
<header class="header">
    <nav class="header__nav">
        <div class="header__nav__left">
            <a href="/">
                <div class="header__nav__logo">
                    Alishney Cosmetic Store
                </div>
            </a>
            <div class="header__nav__pages">
                <?php
                foreach (array_slice(scandir('./pages'), 2) as $site_page) {
                    $site_page_url     = basename($site_page, '.html');
                    $site_page_name    = ucfirst($site_page_url);
                    $active_page_class = $site_page_url === $page ? 'header__nav__link__active' : ''
                    ?>
                    <a class="header__nav__link <?= $active_page_class ?>"
                       href="/<?= $site_page_url ?>"><?= $site_page_name ?></a>
                    <?php
                } ?>
            </div>
        </div>
        <div class="header__nav__right">
            <input class="header__nav__search" type="text" placeholder="search">
            <a class="header__nav__basket" href="#"><i class="fas fa-shopping-cart"></i></a>
            <a class="header__nav__signin" href="#">Sign in</a>
        </div>
    </nav>
</header>
<main>