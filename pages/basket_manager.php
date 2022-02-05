<?php

switch ($_GET['action']) {
    case 'add':
        $_SESSION['basket'][] = (int)$_GET['item_id'];
        break;
    case 'remove':
        unset($_SESSION['basket'][array_search((int)$_GET['item_id'], $_SESSION['basket'])]);;
        break;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);