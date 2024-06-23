<?php
session_start();
$_SESSION['sacola'] = [];

header('Location: sacola.php');
exit;
