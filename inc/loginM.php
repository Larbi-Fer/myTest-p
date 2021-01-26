<?php
session_start();

    require_once ("coon.php");
    $emPh = $_POST['email'];
    $pass = $_POST['password'];
    $slc  = mysqli_query($coon , "SELECT * FROM employee
     WHERE EmailPhon='".$emPh."' AND password='".$pass."'")
     or die( mysqli_error( $coon ) );
    //
    $num  = mysqli_num_rows( $slc );
    $fath = mysqli_fetch_assoc($slc);

    if( $num == 1 ){
        echo "ok";
        $_SESSION['email'] = $emPh;
        $_SESSION['empno'] = $fath['EmpNO'];
        $_SESSION['Name'] = $fath['ALA'];
    }
    else{
        echo "email or Password false";
    }




?>