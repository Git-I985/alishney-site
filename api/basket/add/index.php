<?php

try {
    include "../../../utils.php";
    include "../../../data.php";

    session_start();

    if ( ! isset($_SESSION['basket'])) {
        $_SESSION['basket'] = [];
    }

    $url_parts = explode('/' , $_SERVER['REQUEST_URI']);
    $requestItemId = (int) $url_parts[count($url_parts) - 1];


    $_SESSION['basket'][] = $requestItemId;
    echo json_encode(["basket_item" => getItemById($requestItemId, $makeup)]);
} catch (Exception $e) {
    echo json_encode(["error" => $e]);
}
