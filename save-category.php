<?php

    require_once './includes/connection.php';
    
    $name = !empty($_POST['name']) ? mysqli_real_escape_string($db, trim($_POST['name'])) : false;
    if(!$name || is_numeric($name) || preg_match("/[0-9]/", $name)){
        $_SESSION['mistakes']['name'] = 'Error ingrese un nombre de categoría válido';
    }
    if(!isset($_SESSION['mistakes'])){
        $sql = "CALL sp_crear_categoria('$name');";
        if(mysqli_query($db, $sql)){
            $_SESSION['success-create-category'] = 'Categoría creada exitosamente';
        }else{
            $_SESSION['mistakes']['general'] = 'Error al crear la categoría';
        }
    }
    header('Location: create-category.php');

?>