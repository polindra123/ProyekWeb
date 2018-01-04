<?php

    $host   ="localhost";
    $user ="root";
    $password ="";
    $db ="depnaker"; 
    
    $config =  mysqli_connect($host, $user, $password,$db);
    if(mysqli_connect_errno())
    {
    echo'Gagal bang:'.mysqli_connect_error();
    }
    else {
    }
    error_reporting(0);
    
?>
