<?php
session_start();
    $sessio_Data = $_SESSION['error'];
    $val = $_SESSION['dataDisplayed'];
    if(!$val){
        echo $sessio_Data;
        $_SESSION['dataDisplayed'] = true;
    }

?>