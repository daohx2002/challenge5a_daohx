<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: /challenge5a_daohx/index.php');
    die();
}


?>