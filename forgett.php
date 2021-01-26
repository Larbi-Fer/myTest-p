<?php
session_start();
if( isset( $_GET["email"] ) && isset( $_GET["token"] ) ){
    require_once ("inc/coon.php");
    $email = mysqli_real_escape_string($coon,$_GET["email"]);
    $token = mysqli_real_escape_string($coon,$_GET["token"]);
    $verifyTokenEmail = mysqli_query($coon,"SELECT * FROM employees 
        WHERE EP='".$email."'
        AND token='".$token."'
        AND tokenTime > DATE_SUB(NOW(),INTERVAL 30 MINUTE)")
        or die( mysqli_error($coon) );
    //$delet = mysqli_query($coon , "DELETE FROM employees WHERE tokenTime < DATE_SUB(NOW(),INTERVAL 30 MINUTE)")
      //  or die( mysqli_error($coon) );
    $count = mysqli_num_rows($verifyTokenEmail);
    if( $count == 1 ){

        $emp = mysqli_fetch_assoc($verifyTokenEmail);
        $n1 = $emp["name1"];
        $n2 = $emp["name2"];
        $j = $emp["jan"];
        $ep = $emp["EP"];
        $pass = $emp["pass"];
        $loc = $emp["loc"];
        $bd = $emp["BD"];
        $ad = $emp["ad"];
        $co = $emp["co"];
        $hd = date('Y-m-d');
        $n = "$n1 $n2";

        $EN = $emp["EMPNO"];
        
        $insert = mysqli_query( $coon, "INSERT INTO employee( Name1, Name2,
            jander, EmailPhon, password, Location, BARTHDATE, HIRINGDATE, Address,
            country,ALA) VALUES ( '$n1' , '$n2' ,'$j' ,'$ep' ,'$pass' ,'$loc' ,'$bd',
            '$hd','$ad' ,'$co','$n' )") or die( mysqli_error($coon) );
        $delet  = mysqli_query($coon,"DELETE FROM employees WHERE EMPNO='".$EN."'")
            or die( mysqli_error($coon) );
        
        $slc  = mysqli_query($coon , "SELECT * FROM employee
            WHERE EmailPhon='".$ep."' AND password='".$pass."'")
            or die( mysqli_error( $coon ) );
            
        $fath = mysqli_fetch_assoc($slc);
        if( $insert ){
            echo "ok";
            $_SESSION['email'] = $ep;
            $_SESSION['empno'] = $fath['EmailPhon'];
            $_SESSION['Name1'] = $fath['Name1'];
            $_SESSION['Name2'] = $fath['Name2'];
            header("Location:profile.php");
        }
        else
            echo "no ok";
    }
    else{
        header("Location: Sing.php");
    }
}
else{
    header("Location: Sing.php");
}

?>