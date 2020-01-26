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

?>