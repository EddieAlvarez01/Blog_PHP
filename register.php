<?php
    if(isset($_POST)){
        require_once './includes/connection.php';
        if(!isset($_SESSION)){
            session_start();
        }
        
        /*RECOGER VALORES DEL FORMULARIO*/
        $name = !empty($_POST['name']) ? mysqli_real_escape_string($db, trim($_POST['name'])) : false;
        $lastName = !empty($_POST['lastName']) ? mysqli_real_escape_string($db, trim($_POST['lastName'])) : false;
        $email = !empty($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
        $password = !empty($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
        
        //ARRAY DE ERRORES
        $mistakes = array();
        
        //VALIDAR LA INFO
        if(!$name || is_numeric($name) || preg_match("/[0-9]/", $name)){
            $mistakes['name'] = 'El nombre es inválido';
        }
        
        if(is_numeric($lastName) || preg_match("/[0-9]/", $lastName)){
            $mistakes['lastName'] = 'Los apellidos son inválidos';
        }
        
        if(!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $mistakes['email'] = 'El email es inválido';
        }
        
        if(!$password){
            $mistakes['password'] = 'El password es inválido';
        }
        
        if(count($mistakes) == 0){
            //CIFRAR LA CONSTRASEÑA
            $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
            
            /* INSERTAR  en la bd*/
            $sql = "INSERT INTO Usuario(nombre, apellidos, email, password, fecha_registro)
                    VALUES('$name', '$lastName', '$email', '$encryptedPassword', CURDATE())";
            if(mysqli_query($db, $sql)){
                $_SESSION['complete'] = 'Usuario registrado correctamente';
            }else{
                $_SESSION['mistakes']['general'] = 'Error al registar el usuario';
            }
        }else{
            $_SESSION['mistakes'] = $mistakes;
        }
        
    }
  
    header('Location: index.php');
    
?>