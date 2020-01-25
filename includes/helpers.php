<?php

    function ShowErrors($mistakes, $field){
        $alert = '';
        if(!empty($mistakes[$field])){
            $alert = '<div class="error-alert">' . $mistakes[$field] . '</div>';   
        }
        return $alert;
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
    }

?>