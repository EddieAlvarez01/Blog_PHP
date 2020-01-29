<?php

    require_once './includes/connection.php';
    
    if(!isset($_SESSION)){
        session_start();
    }
    $title = !empty($_POST['title']) ? mysqli_real_escape_string($db, trim($_POST['title'])) : false;
    $description = !empty($_POST['description']) ? mysqli_real_escape_string($db, trim($_POST['description'])) : null;
    $category = $_POST['category'];
    $id = (int)$_POST['id'];
    if(!$title || is_numeric($title) || preg_match("/[0-9]/", $title)){
        $_SESSION['error-edit']['title'] = 'Ingrese un titulo válido';
    }
    if(!isset($_SESSION['error-edit'])){
        $sql = "UPDATE Entrada
                SET titulo = '$title', descripcion = '$description', categoria_id = $category
                WHERE id = $id;";
        if(mysqli_query($db, $sql)){
            header('Location: index.php');
        }else{
            $_SESSION['error-edit']['general'] = 'Error al editar la entrada';
            header("Location: edit-entry.php?id=$id");
        }
    }else{
        header("Location: edit-entry.php?id=$id");
    }

?>