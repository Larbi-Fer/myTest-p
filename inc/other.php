<?php

session_start();
require_once "coon.php";
$ot = $_POST['ot'];
$id = $_SESSION['empno'];

///// طلب الصداقة ////////

if( $ot == "ami" ){
    $EmpNo = $_POST['id'];
    $insert = mysqli_query($coon,"INSERT INTO iami(EMPNO, EMPAMINO)
            VALUES ($id,$EmpNo)") or die( mysqli_error($coon) );
    if( $insert ){
        echo "ok";
    }
    else{
        echo "no ok";
    }
    /*while($row = mysqli_fetch_assoc($seslect)){
        $r .= "<div>".$row['ALA']." 
        <button class='submit-btn-1' style='width:100px' onclick='ami(this.id)' id='".$row['EmpNO']."'>إضافة صديق</button> </div>";
    }*/
}

////// حذف طلب الصداقة //////////

else if( $ot == "amid" ){
    $EmpNo = $_POST['id'];
    $delet = mysqli_query($coon,"DELETE FROM iami WHERE (iami.EMPNO = 
            $id OR iami.EMPAMINO = $id)
            AND (iami.EMPNO = '$EmpNo' OR iami.EMPAMINO = '$EmpNo')") 
            or die( mysqli_error($coon) );
    if( $delet ){
        echo "ok";
    }
    else{
        echo "no ok";
    }
}

////// قول طلب الصداقة //////////
else if( $ot == "iAmi" ){

    $EmpNo = $_POST['id'];
    $insert = mysqli_query($coon,"INSERT INTO ami(EMPNO, EMPAMINO)
            VALUES ( $id , $EmpNo )") 
            or die( mysqli_error($coon) );
    $delet = mysqli_query($coon,"DELETE FROM iami WHERE (iami.EMPNO = 
        $id OR iami.EMPAMINO = $id)
        AND (iami.EMPNO = '$EmpNo' OR iami.EMPAMINO = '$EmpNo')") 
        or die( mysqli_error($coon) );
    if( $insert ){
        echo "أصبحتما صديقين";
    }
    else{
        echo "no ok";
    }

}

?>