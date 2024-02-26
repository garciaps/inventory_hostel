<?php
session_start();
    $sessio_Data2 = $_SESSION['error'];
    $val2 = $_SESSION['toolDisplayed'];
    if(!$val2){
        echo $sessio_Data2;
        $_SESSION['toolDisplayed'] = true;
    }

?>