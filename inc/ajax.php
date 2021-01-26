<?php

session_start();
require_once "coon.php";
$id = $_SESSION['empno'];
$add = $_POST['add'];

//////////// employee //////////////

if( $add == "emp" ){

    $search = $_POST['va'];
    $seslect = mysqli_query($coon,"SELECT ALA,EmpNO FROM employee WHERE EmailPhon LIKE '%$search%' 
        OR Name1 LIKE '%$search%' OR Name2 LIKE '%$search%' OR ALA LIKE '%$search%'")
        or die( mysqli_error($coon) );
    /*$seslect = mysqli_query($coon,"SELECT * FROM `employee` WHERE 
        EmpNO = '$EmpNo'") or die( mysqli_error($coon) );
    /*$seslect = mysqli_query($coon,"SELECT * FROM `employee` WHERE 
    ALA != '".$_SESSION['Name']."'") or die( mysqli_error($coon) );*/
    /*$seslect = mysqli_query($coon,"SELECT * FROM `employee` WHERE 
    ALA != '".$_SESSION['Name']."'") or die( mysqli_error($coon) );
    $r = "";*/
    /*$seslect = mysqli_query($coon,"SELECT * FROM employee WHERE EmailPhon LIKE '%$search%' 
        OR Name1 LIKE '%$search%'OR Name2 LIKE '%$search%'")
        or die( mysqli_error($coon) );*/
    $r = "";
    /*if( mysqli_num_rows($seslect) ){
        echo "<center>لا يوجد طلبات صداقة</center>";
    }*/
    //else{
        
        while($row = mysqli_fetch_assoc($seslect)){

            $sel = mysqli_query($coon,"SELECT * FROM ami WHERE (ami.EMPNO = '".$row['EmpNO']."'
                OR ami.EMPAMINO = '".$row['EmpNO']."')
                AND (ami.EMPNO = $id OR ami.EMPAMINO = $id)")
                or die( mysqli_error($coon) );
            /*$sel = mysqli_query($coon,"SELECT * FROM employee WHERE EmailPhon LIKE '%".$row['EmpNO']."%' 
                OR Name1 LIKE '%".$row['EmpNO']."%'OR Name2 LIKE '%".$row['EmpNO']."%'")
                or die( mysqli_error($coon) );*/

            if( mysqli_num_rows($sel) == 0 ){

                $sel = mysqli_query($coon,"SELECT * FROM iami WHERE (iami.EMPNO = '".$row['EmpNO']."'
                OR iami.EMPAMINO = '".$row['EmpNO']."')
                AND (iami.EMPNO = '$id' OR iami.EMPAMINO = '$id')")
                or die( mysqli_error($coon) );
                
                /////////// إضافــة صــديـق ////////////
                if( mysqli_num_rows($sel) == 0 ){

                    $r .= "<tr class='list-1'> <td> ".$row['ALA']."</td>
                        <td colspan='2' style='padding: 5px;'><button class='submit-btn-2' style='width:100px;border-radius: 20px;outline: none;'
                        onclick='ami(this.id,".'"i"'.")' id='".$row['EmpNO']."'>إضافة صديق
                        </button></td>";
                }
                ////////// أرســل طلب صداقة ////////////
                else{
                    $sel = mysqli_query($coon,"SELECT * FROM iami WHERE 
                        (iami.EMPNO = '".$row['EmpNO']."' AND iami.EMPAMINO = $id)")
                        or die( mysqli_error($coon) );
                    if( mysqli_num_rows($sel) == 0 ){
                        $r .= "<tr class='list-1'> <td> ".$row['ALA']."</td>
                            <td colspan='2' style='padding: 5px;'><button class='submit-btn-2' style='width:100px;border-radius: 20px;' 
                            onclick='ami(this.id,".'"d"'.")' id='".$row['EmpNO']."'>حذف الطلب
                            </button></td>";
                    }
                    else{
                        /*$r .= "<div>".$row['ALA']."
                            <button class='submit-btn-2' style='width:100px;border-radius: 20px;'
                            onclick='ami(this.id,".'"iAmi"'.")' id='".$row['EmpNO']."'>قبول</button>
                            <button class='submit-btn-2' style='width:100px;border-radius: 20px;' 
                            onclick='ami(this.id,".'"dAmi"'.")' id='".$row['EmpNO']."'>حذف
                            </button> </div>";*/

                        $r .= "<tr class='list-1'> <td> ".$row['ALA']."</td>
                            <td style='padding: 5px;'><button class='submit-btn-2' style='width:100px;border-radius: 20px;'
                            data-id='".$row['EmpNO']."' id='Add'>قبول</button>
                            </td>
                            <td style='padding: 5px;'><button class='submit-btn-2' style='width:100px;border-radius: 20px;' 
                            data-id='".$row['EmpNO']."' id='Delete'>حذف
                            </button></td>";
                    }
                }

            }
            else{
                //////////// الصفحة الشخصية ////////////////
                if( $row['EmpNO'] == $id ){
                    $r .= "<tr class='list-1'> <td> ".$row['ALA']."</td>
                        <td colspan='2' style='padding: 5px;'><b>الصفحة الشخصية</b></td>";
                }
                ////// الــصـــديـــــق ///////////
                else{
                    $r .= "<tr class='list-1'> <td> ".$row['ALA']."</td>
                        <td colspan='2' style='padding: 5px;'><button class='submit-btn-2'
                        style='width:100px;border-radius: 20px; '>صديق</button></td>";
                }
            }

        }
    //}
    echo "<center> <table> $r </table> </center>";
    //echo "<center> $r </center>";

}

/////// نتائج البحث reselt Search //////////////

else if( $add == "empS" ){
    //echo "<div class='list-search list-search-1'>";
    $search = $_POST['search'];
    $select = mysqli_query($coon,"SELECT ALA,EmpNO FROM employee WHERE EmailPhon LIKE '%$search%' 
        OR Name1 LIKE '%$search%' OR Name2 LIKE '%$search%' OR ALA LIKE '%$search%'")
        or die( mysqli_error($coon) );
    if( mysqli_num_rows($select) != 0 ){
        while($row = mysqli_fetch_assoc($select)){
            echo "<div class='list-s' onclick='resSear(this.innerHTML)'>" . $row['ALA'] ."</div>";
        }
    }
    else{
        echo "<div class='list-s'> لا يوجد نتائج البحث عن $search </div>";
    }
    //echo "</div>";
}



//////////// طلبات الصداقة //////////////
else if( $add == "iami" ){
    
    $r = "";
    $seslect = mysqli_query($coon,"SELECT * FROM i_ami_v WHERE `emp NO2` = '$id' ");
    if( mysqli_num_rows($seslect) == 0 ){
        echo "<center style='margin: 10px 20px;'>لا يوجد طلبات صداقة</center>";
    }
    else{
        while($row = mysqli_fetch_assoc($seslect)){
            /*if( $row['emp1 Name'] == $_SESSION['Name'] ){
                $name = $row['emp2 Name'];
                $eid = $row['emp NO2'];
            }*/
            //else if( $row['emp2 Name'] == $_SESSION['Name'] ){
                $name = $row['emp1 Name'];
                $eid = $row['emp NO'];
            //}*/
            $r .= "<tr class='list-1'> <td> $name</td>
                <td style='padding: 5px;'><button class='submit-btn-2' style='width:100px;border-radius: 20px;' 
                id='Add' data-id='$eid'>قبول</button></td>
                <td style='padding: 5px;'><button class='submit-btn-2' style='width:100px;border-radius: 20px;' 
                id='Delete' data-id='$eid'>حذف
                </button></td> </tr>";
        }
    }
    echo $r;
    
}

/////////// الأصدقاء //////////

else if( $add == "ami" ){
    $r = "";
    $select = mysqli_query($coon,"SELECT * FROM `ami_v` WHERE `emp NO` = $id 
            OR `emp NO2` = $id") or die( mysqli_error($coon) );
    while($row = mysqli_fetch_assoc($select)){
        if( $row['emp NO'] == $id ){
            $name = $row['emp2 Name'];
            $eid = $row['emp NO2'];
        }
        else if( $row['emp NO2'] == $id ){
            $name = $row['emp1 Name'];
            $eid = $row['emp NO'];
        }
        $r .= "<div class='list-1'>$name</div>";
    }
    echo $r;

}


/////////// الإرسال //////////////
else if( $add == "sen" ){
    $EmpNo = $_POST['i'];
    $msg = $_POST['txt'];
    //echo "INSERT INTO massge(`id1`, `id2`,`massge`, `date`) VALUES($id , $EmpNo , '$msg' , NOW()";
    $select = mysqli_query($coon,"SELECT * FROM `ami` WHERE (EMPNO = $id 
        OR EMPAMINO = $id) AND (EMPNO = $EmpNo 
        OR EMPAMINO = $EmpNo)") or die( mysqli_error( $coon ) );
    if( mysqli_num_rows($select) > 0 ){
        $insert = mysqli_query( $coon , "INSERT INTO massge(`id1`, `id2`,
        `massge`, `date`) VALUES($id , $EmpNo , '$msg' , NOW() )" )
        or die( mysqli_error($coon) );
        if( $insert ){
            echo "ok";
        }
        else{
            echo "no ok";
        }
    }
    else{
        echo "error !!!";
    }
}

/////////// إظهار الرسائل ////////////

else if( $add == "msg" ){
    $EmpNo = $_POST['i'];
    $chat = $_POST['chat'];
    $date = 0;
    $r = "";
    $select = mysqli_query($coon,"SELECT * FROM `ami` WHERE (EMPNO = $id 
        OR EMPAMINO = $id) AND (EMPNO = $EmpNo 
        OR EMPAMINO = $EmpNo)") or die( mysqli_error( $coon ) );
    if( mysqli_num_rows($select) > 0 ){
        $select = mysqli_query( $coon , "SELECT * FROM `massge_v` WHERE (`emp NO` = $id
            OR`emp NO2` = $id) AND (`emp NO` = $EmpNo OR `emp NO2` = $EmpNo) ORDER by `date`" )
            or die( mysqli_error( $coon ) );
        $x = 1;
        if( mysqli_num_rows($select) > 0 ){
            while( $row = mysqli_fetch_assoc($select) ){
                if( $x == 1 ){
                    if( $row['emp NO'] == $id ){
                        $r .= "<div class='title-chat'>
                            <img src='img/f2.png'><div class='name'>".$row['emp2 Name']."
                            </div><input data-emp='".$row['emp NO2']."' type='hidden' id='inpH' class='emp'></div>";
                    }
                    else{
                        $r .= "<div class='title-chat'>
                            <img src='img/f2.png'><div class='name'>".$row['emp1 Name']."
                            </div><input type='hidden' data-emp='".$row['emp NO']."' id='inpH' class='emp'></div>";
                    }
                    $r.= "<div class='massge'>";
                    $x++;
                }
                if( $date != $row['date'] ){
                    $date = $row['date'];
                    $r .= "<div class='dataTime'>$date</div>";
                }

                if( $row['emp NO'] == $id ){
                    $r .= "<div class='me'><div class='msgM'> " . $row['massge'] . " </div></div>";
                }
                else if( $row['emp NO2'] == $id ){
                    $r .= "<div class='amimsg'><div class='nameAmi'>" . $row    ['emp1 Name'] . "</div>
                        <div class='msgM'>" . $row['massge'] . "</div><img src='img/f2.png'></div>";
                }
            }
            $r .= "</div><div class='text-massge'><input id='textSend' placeholder='أكتب رسالتك' dir='rtl' type='text' id=''><i class='glyphicon glyphicon-send' onclick='send();' id='sendID'></i></div>";
            if( empty($chat) )
                echo $r;
            else{
                if( $chat != $r ){
                    //echo $chat."<br>";
                    echo $r;
                }
            }
        }
        else{
            echo "<div>لا رسائل حتى الآن</div>";
        }
    }
    else{
        echo "error !!";
    }
}

/////////// عرض الأصدقاء للمحادثة /////////////

if( $add == "empD" ){
    $select = mysqli_query($coon,"SELECT * FROM `ami_v` WHERE `emp NO` = $id 
            OR `emp NO2` = $id") or die( mysqli_error($coon) );

    if( mysqli_num_rows($select) > 0 ){
        while( $row = mysqli_fetch_assoc($select) ){
            if( $row['emp NO'] == $id ){
                $name = $row['emp2 Name'];
                $eid = $row['emp NO2'];
            }
            else if( $row['emp NO2'] == $id ){
                $name = $row['emp1 Name'];
                $eid = $row['emp NO'];
            }
            /*echo "<div data-emp='$eid' class='ami-list' onclick='mess(this.getAttribute('data-emp'));'>$name</div>";*/
            echo "<div data-emp='$eid' class='ami-list' onclick='msg($eid);'>$name</div>";
        }
    }
    else{
        echo "لا أصدقاة للمحادثة";
    }
}

?>