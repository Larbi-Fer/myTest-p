<?php

require_once ("coon.php");
/*$sql = "";
$userN1 = "";
$userN2 = "";
$phone = "";
$email = "";
$pass = "";
$BDate = "";*/

$test = $_POST["test"];

if( $test == "sing" ){

    $jander = $_POST["jander"];

    $userN1 = $_POST['userN1'];

    $userN2 = $_POST["userN2"];

    $email = $_POST["email"];

    $pass = $_POST["password"];

    $BDate = $_POST["DateB"];

    $loca = $_POST['Location'];
    
    $address = $_POST['Address'];

    $country = $_POST['country'];


    /*$token = bin2hex(random_bytes(60));
    
    $sqls = "INSERT INTO employee_s(name1, name2, jan, EP, pass, loc, BD, ad, 
        co, token, tokenTime) VALUES  ('$userN1','$userN2','$jander','$email',
        '$pass','$loca','$BDate','$address','$country','$token',NOW())"
        or die( mysqli_error($coon) );
    $mysql = mysqli_query($coon, $sqls);
    if( $mysql ){
        $to = "$email";
        $subject = "التحقق";
        $txt = "http://localhost/myapp/forgett.php?email=".$email."&token=".$token."";
        $headers = "From:admin@galaxyprog.com";
        $send = mail($to,$subject,$txt,$headers);
        if( $send ){
            echo "ok";
        }
        else{
            echo "لم يتم الإرسال";
        }
    }
    else{
        echo "no Add";
    }*/
    $n = "$userN1 $userN2";
    $hd = date('Y-m-d');
    $insert = mysqli_query( $coon, "INSERT INTO employee( Name1, Name2,
            jander, EmailPhon, password, Location, BARTHDATE, HIRINGDATE, Address,
            country,ALA) VALUES ( '$userN1' , '$userN2' ,'$jander' ,'$email' ,'$pass' ,'$loca' ,'$BDate',
            '$hd','$address' ,'$country','$n' )") or die( mysqli_error($coon) );
    
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
    else{
        echo "no ok";
    }
}
else if( $test == "country" ){
    $country = $_POST['country1'];
    $select = mysqli_query( $coon, "SELECT * FROM telephone WHERE country='".$country."' " )
        or die( mysqli_error($coon) );
    $fath   = mysqli_fetch_assoc( $select );
    //echo $fath['num'];
}

    
/*
if( isset( $_POST['login'] ) ){
    $user = $_POST['userN'];
    $pass = $_POST['password1'];
    $slc  = "SELECT Email,password FROM employee WHERE Email='".$user."' AND password='".$pass."'";
}*/
/*
if( isset( $_POST["SingUpPE"] ) ){
    
    
    $sqls = "INSERT INTO employee(Name1, Name2, Phone, Email, password,Location, BARTHDATE, HIRINGDATE)VALUES ('$userN1','$userN2','$phone','$email','$pass','$loca','$BDate','$HDate')";
    mysqli_query($coon, $sqls);
    $gan = "SELECT MAX(EmpNO) AS EmpNOMax FROM employee";
    mysqli_query($coon,$gan);
    $x1 = 0;
    while( $x1 < $x ){
        $xx = "x".$x1;
        $pho = $_POST["$xx"];
        //$ema = $_POST["y$y"];
        $sqll = "INSERT INTO pho_empolee VALUES(".$gan["EmpNOMax"].",$pho)";
        mysqli_query($coon,$sqll);
        $x1++;
        echo "$x ; $sqll";
    }
}*/

/* 
SELECT
	(@v_NO1 := EmpNO),
	(@v_name1 := Name1),
	(@v_name2 := Name2)
FROM employee WHERE EmpNO = 13;

SELECT
	(@v_NO2 := EmpNO),
	(@v_name3 := Name1) ,
	(@v_name4 := Name2)
FROM employee WHERE EmpNO = 1;

SELECT @v_NO1 AS EmpNo1,
@v_name1 AS Name1,
@v_name2 AS Name2,
@v_NO2 AS EmpNo2,
@v_name3 AS AmiName1,
@v_name4 AS AmiName2;




DELIMITER $$
CREATE PROCEDURE ami1(in num1 int, in num2 int)
BEGIN
SELECT
	(@v_ENO := EMPNO),
    (@v_EANO := EMPAMINO)
FROM ami;

SELECT
	(@v_NO1 := EmpNO),
	(@v_name1 := Name1),
	(@v_name2 := Name2)
FROM employee WHERE EmpNO = num1;

SELECT
	(@v_NO2 := EmpNO),
	(@v_name3 := Name1) ,
	(@v_name4 := Name2)
FROM employee WHERE EmpNO = num2;

SELECT @v_NO1 AS EmpNo1,
@v_name1 AS Name1,
@v_name2 AS Name2,
@v_NO2 AS EmpNo2,
@v_name3 AS AmiName1,
@v_name4 AS AmiName2;

END$$
DELIMITER ;



*/

?>

