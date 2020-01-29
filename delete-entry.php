<?php

    require_once './includes/connection.php';
    
    $idEntry = (int)$_GET['id'];
    $sql = "DELETE FROM Entrada WHERE id = $idEntry;";
    if(mysqli_query($db, $sql)){
        header('Location: index.php');
    }else{
        $_SESSION['error-delete']['general'] = 'Error al eliminar la entrada';
        header("Location: entry-detail.php?id=$idEntry");
    }

?>