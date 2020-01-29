<?php

    function ShowErrors($mistakes, $field){
        $alert = '';
        if(!empty($mistakes[$field])){
            $alert = '<div class="error-alert">' . $mistakes[$field] . '</div>';   
        }
        return $alert;
    }
    
    function showErrorLogin($mistakes, $field){
        if(!empty($mistakes[$field])){
            return '<div class="error-alert">' . $mistakes[$field] . '</div>';
        }
        return '';
    }
    
    function DeleteErrors(){
        if(isset($_SESSION['mistakes'])){
            $_SESSION['mistakes'] = null;
            unset($_SESSION['mistakes']);
        }
        if(isset($_SESSION['complete'])){
            $_SESSION['complete'] = null;
            unset($_SESSION['complete']);
        }
        if(isset($_SESSION['success-create-category'])){
            $_SESSION['success-create-category'] = null;
            unset($_SESSION['success-create-category']);
        }
        if(isset($_SESSION['mistakesLogin'])){
            $_SESSION['mistakesLogin'] = null;
            unset($_SESSION['mistakesLogin']);
        }
        if(isset($_SESSION['errorCredential'])){
            $_SESSION['errorCredential'] = null;
            unset($_SESSION['errorCredential']);
        }
        if(isset($_SESSION['errorQuery'])){
            $_SESSION['errorQuery'] = null;
            unset($_SESSION['errorQuery']);
        }
    }
    
    function GenericDeleteErrors($errors){
        if(isset($_SESSION[$errors])){
            unset($_SESSION[$errors]);
        }
    }
    
    function GetCategories($db){
        $sql = "SELECT * FROM Categoria;";
        $categories = mysqli_query($db, $sql);
        if($categories && mysqli_num_rows($categories) > 0){
            return $categories;
        }
        return array();
    }
    
    function GetEntrys($db){
        $sql = "SELECT e.*, c.nombre 
                FROM Entrada e
                INNER JOIN Categoria c ON c.id = e.categoria_id
                ORDER BY e.fecha DESC
                LIMIT 4;";
        $entrys = mysqli_query($db, $sql);
        if($entrys && mysqli_num_rows($entrys) > 0){
            return $entrys;
        }
        return array();
    }
    
    function GetAllEntrys($db){
        $sql = "SELECT e.*, c.nombre
                FROM Entrada e
                INNER JOIN Categoria c ON c.id = e.categoria_id
                ORDER BY e.fecha DESC";
        $entrys = mysqli_query($db, $sql);
        if($entrys && mysqli_num_rows($entrys) > 0){
            return $entrys;
        }
        return array();
    }
    
    function GetUser($db, $id){
        $sql = "SELECT nombre, apellidos, email, password
                FROM Usuario
                WHERE id = $id;";
        $user = mysqli_query($db, $sql);
        if($user && mysqli_num_rows($user) > 0){
            return $user;
        }
        return array();
    }
    
    function GetEntrysForCategory($db, $category){
        $sql = "SELECT e.*, c.nombre
                FROM Entrada e
                INNER JOIN Categoria c ON c.id = e.categoria_id
                WHERE e.categoria_id = $category 
                ORDER BY e.fecha DESC";
        $entrys = mysqli_query($db, $sql);
        if($entrys && mysqli_num_rows($entrys) > 0){
            return $entrys;
        }
        return array();
    }
    
    function GetEntryByid($db, $id){
        $sql = "SELECT e.*, c.nombre, CONCAT(usr.nombre, ' ', usr.apellidos) AS 'autor'
                FROM Entrada e
                INNER JOIN Categoria c ON c.id = e.categoria_id
                INNER JOIN Usuario usr ON usr.id = e.usuario_id
                WHERE e.id = $id;";
        $entrys = mysqli_query($db, $sql);
        if($entrys && mysqli_num_rows($entrys) > 0){
            return $entrys;
        }
        return array();
    }

?>