<?php
    
    if(isset($_POST)){
        require_once './includes/connection.php';
        if(!isset($_SESSION)){
            session_start();
        }
        
        /* RECOGER INFO DEL FORM */
        $email = !empty($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
        $password = !empty($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
        
        /* VALIDAR CAMPOS */
        if(!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['mistakesLogin']['email'] = 'El email es inválido';
        }
        if(!$password){
            $_SESSION['mistakesLogin']['password'] = 'Password inválido';
        }
        if(!isset($_SESSION['mistakesLogin'])){
            $sql = "SELECT password
                    FROM Usuario
                    WHERE email = '$email'";
            $result = mysqli_query($db, $sql);
            if($result){
                $row = mysqli_fetch_assoc($result);
                if($row){
                    if(password_verify($password, $row['password'])){
                        $password = $row['password'];
                        $sql = "SELECT id, CONCAT(nombre, ' ', apellidos) AS 'nombre', email
                                FROM Usuario
                                WHERE email = '$email' AND password = '$password'";
                        $result = mysqli_query($db, $sql);
                        while($user = mysqli_fetch_assoc($result)){
                            $_SESSION['user']['id'] = $user['id'];
                            $_SESSION['user']['name'] = $user['nombre'];
                            $_SESSION['user']['email'] = $user['email'];
                        }
                    }else{
                        $_SESSION['errorCredential'] = 'Credenciales incorrectos';
                    }
                }else{
                    $_SESSION['errorCredential'] = 'Credenciales incorrectos';
                }
            }else{
                $_SESSION['errorQuery'] = 'Error al ejecutar el query';
            }
        }
        header('Location: index.php');
    }

?>