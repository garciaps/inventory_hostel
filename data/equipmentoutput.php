<?php
session_start();
    $sessio_Data1 = $_SESSION['error'];
    $val1 = $_SESSION['equipmentDisplayed'];
    if(!$val1){
        echo $sessio_Data1;
        $_SESSION['equipmentDisplayed'] = true;
    }

?>