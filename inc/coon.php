<?php 

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "myapp";

    $coon = mysqli_connect( $host, $user, $pass, $db) ;
    //$coon = mysqli_connect( "localhost", "root", "", "myapp") ;
/*
    if( $coon ){
        echo "ok";
    }
    else{
        echo "no ok";
    }
    */
?>