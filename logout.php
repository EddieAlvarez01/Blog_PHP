<?php
    
    require_once './includes/connection.php';
    if(!isset($_SESSION)){
        session_start();
    }
    unset($_SESSION['user']);
    header('Location: index.php');

?>