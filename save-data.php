<?php

    require_once './includes/connection.php';
    
    if(!isset($_SESSION)){
        session_start();
    }
    $name = !empty($_POST['name']) ?  mysqli_real_escape_string($db, trim($_POST['name'])) : false;
    $lastName = !empty($_POST['lastName']) ? mysqli_real_escape_string($db, trim($_POST['lastName'])) : false;
    $email = !empty($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = !empty($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
    
    if(!$name || is_numeric($name) || preg_match("/[0-9]/", $name)){
        $_SESSION['error-edit']['name'] = 'Nombre inválido';
    }
    if(!$lastName || is_numeric($lastName) || preg_match("/[0-9]/", $lastName)){
        $_SESSION['error-edit']['lastName'] = 'Apellidos inválidos';
    }
    if(!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error-edit']['email'] = 'Correo inválido';
    }
    if(!$password){
        $password = $_POST['password2'];
    }else{
        $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
    }
    if(!isset($_SESSION['error-edit'])){
        $idUser = $_SESSION['user']['id'];
        $sql = "UPDATE Usuario
                SET nombre = '$name', apellidos = '$lastName', email = '$email', password = '$password'
                WHERE id = $idUser;";
        if(mysqli_query($db, $sql)){
            $_SESSION['user']['name'] = $name . ' ' . $lastName;
            $_SESSION['user']['email'] = $email;
            header('Location: index.php');
        }else{
            $_SESSION['error-edit']['general'] = 'Error al editar el usuario';
            header('Location: mydata.php');
        }
    }else{
        header('Location: mydata.php');
    }

?>