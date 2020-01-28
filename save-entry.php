<?php

    require_once './includes/connection.php';
    
    if(!isset($_SESSION)){
        session_start();
    }
    $title = !empty($_POST['title']) ? mysqli_real_escape_string($db, trim($_POST['title'])) : false;
    $description = !empty($_POST['description']) ? mysqli_real_escape_string($db, trim($_POST['description'])) : null;
    $category = $_POST['category'];
    if(!$title || is_numeric($title) || preg_match("/[0-9]/", $title)){
        $_SESSION['errorTitle'] = 'Ingrese un titulo válido';
    }
    if(!isset($_SESSION['errorTitle'])){
        $idUser = $_SESSION['user']['id'];
        $sql = "INSERT INTO Entrada(usuario_id, categoria_id, titulo, descripcion, fecha)
                VALUES($idUser, $category, '$title', '$description', CURDATE());";
        if(mysqli_query($db, $sql)){
            $_SESSION['successEntry'] = 'Entrada creada exitosamente';
        }else{
            $_SESSION['error-general'] = 'Error al crear la entrada';
        }
    }
    header('Location: create-entry.php');

?>