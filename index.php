<?php

error_reporting(E_ALL ^ E_NOTICE);

session_start();

if ( ! isset($_SESSION['basket'])) {
    $_SESSION['basket'] = [];
}

$page          = $_GET['page'];
$page_template = __DIR__ . '/pages/' . $page . '.php';

if ( ! file_exists($page_template)) {
    header('Location: ' . '?page=home');
}

include './data.php';
include './utils.php';

?>


<?php
include './components/header.php';
include $page_template;
if ( ! isset($_GET['nofooter'])) {
    include './components/footer.php';
}
?>
