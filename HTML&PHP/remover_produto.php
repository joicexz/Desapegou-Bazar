<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
    $index = $_POST['index'];

    if (isset($_SESSION['sacola'][$index])) {
        unset($_SESSION['sacola'][$index]); //unset apaga

        $_SESSION['sacola'] = array_values($_SESSION['sacola']);
    }
}

header('Location: sacola.php');
exit;
