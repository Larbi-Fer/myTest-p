<?php
require("inc/coon.php");
require("SingUpPHP.php");
//implode('coon.php');
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sing Up and Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="cssFile.css">




</head>
<body>

    <div class="hero" id="hero">
<h1 id="h"></h1>
        <div class="form-box" id="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button class="toggle-btn" onclick="Login();">Log In</button>
                <button class="toggle-btn" onclick="register();">Sing Up</button>
            </div>
            <div class="social-icons">
                <img src="f2.png" alt="">
                <img src="t2.png" alt="">
                <img src="w.png" alt="">
            </div>

            <!----------  Login  تسجيل الدخول  -------->

            <form name="form1" id="login" action="" method="POST" class="input-group">
                <input type="email" class="input-field" name="userN" placeholder="E-mail" required>
                <input type="password" class="input-field" name="password1" placeholder="Password" required>
                <!--<input type="checkbox" class="check-box"><span>Remember Password</span>-->
                <button type="submit" name="login" class="submit-btn" style="margin-top: 50px;">Log In</button>
                
            </form>
            
            <!----------   01 SingUp التسجيل من جديد  -------->
                <div id="register" class="input-group">
                    
                        <input type="text" id="name1" name="userN1" class="input-field" placeholder="User Name" required>
                        <input type="text" id="name2" name="userN2" class="input-field"  placeholder="User Name 2" required>
                        <input type="text" id="emailPho" name="email" class="input-field"  placeholder="email or Phone" required>
                        <input type="password" id="pass" name="password2" class="input-field"  placeholder="Password" required>
                        <!--<input type="checkbox" class="check-box"><span>I agree to the terms and condition</span>-->
                        
                    
                    <button type="button" id="b" class="submit-btn" style="margin-top: 20px;" onclick="Sing1();">Next<i id="icon" class="glyphicon glyphicon-chevron-right"></i></button>
                </div>

                <!----------   02 SingUp التسجيل من جديد  -------->
                <div id="Sing1" class="input-group">

                    <input id="Location" type="text" name="Location" class="input-field" placeholder="Location" required>
                    <input id="Address" type="text" name="Location" class="input-field" placeholder="Address" required>
                    
                    <label>Date Of Barth :</label><input type="date" name="DateB" id="datB" class="input-field input-field1" placeholder="User Name" required>
                    <!--
                    <div class="chec">
                        <div class="ch">
                            <input type="radio" value="1" name="check" id="check1" checked class="check-box" style="margin-top: 10px;" ><label style="margin-top: 10px;" for="check1"> &nbsp;&nbsp;&nbsp; mail</label>
                        </div>
                        <div class="ch">
                            <input type="radio" value="2" name="check" id="check2" class="check-box" style="margin-top: 10px;"><label style="margin-top: 10px;" for="check2"> &nbsp;&nbsp;&nbsp; femail</label>
                        </div>
                    </div>
                    -->
                    <!--<input type="checkbox" class="check-box"><span>I agree to the terms and condition</span>-->
                    <!----------
                    <input type="radio" name="check" id="check2" class="check-box" style="margin-top: 10px;"><label style="margin-top: 10px;" for="check2"> &nbsp;&nbsp;&nbsp; إضافة هواتف أو إيميل آخر</label>
                    <br>
                    
                    <input type="radio" checked name="check" id="check" class="check-box" style="margin-top: 10px;"><label style="margin-top: 10px;" for="check"> &nbsp;&nbsp;&nbsp;عدم الإضافة</label>
                    
                    <br>
                    <button type="button" class="submit-btn submit-btn1" id="sub-mit2" onclick="P1();"><i id="icon1" class="glyphicon glyphicon-chevron-left"></i>prfds</button>
                    <button type="button" id="Nex" class="submit-btn submit-btn1" onclick="N1();">Next<i id="icon1" class="glyphicon glyphicon-chevron-right sub-mit1" id="sub-mit1"></i></button>
                    -------->
                    <select name="" class="input-field" id="jen">
                        <option value="1">mail</option>
                        <option value="2">femail</option>
                    </select><br>
                    <div class="info"></div>
                    <button type="button" class="submit-btn submit-btn1" id="sub-mit2" onclick="P1();"><i id="icon1" class="glyphicon glyphicon-chevron-left"></i>prfds</button>
                    <button type="submit" name="SingUp" id="submit" class="submit-btn submit-btn1" style="margin-top: 10px">Sing Up </button>
                </div>

                <!----------  الهواتف والإيميل 03 SingUp التسجيل من جديد  -------->
                <!----------
                <div id="Sing2" class="input-group">
                    <button type="button" id="phones-btn" class="submit-btn submit-btn2" onclick="phon();">Phones &nbsp;&nbsp;&nbsp; +</button>

                    <div id="phones-div"></div>
                    <button type="button" id="email-btn" class="submit-btn submit-btn2" onclick="ema();">email &nbsp;&nbsp;&nbsp; +</button>
                    <div id="email-div"></div>
                        
                        
                        <input type="text" class="input-field input-field2" placeholder="Phone" required>
                        <label for="" class="label-field">+</label>
                        <input type="text" class="input-field input-field2" placeholder="email" required>
                        <label for="" class="label-field">+</label>
                        <input type="checkbox" class="check-box"><span>I agree to the terms and condition</span>
                        <button type="button" class="submit-btn" style="margin-top: 60px;" onclick="P2();"><i id="icon1" class="glyphicon glyphicon-chevron-left"></i>prfds</button>
                        <button name="SingUpPE" class="submit-btn" onclick="N2();" style="margin-top: 20px">Sing Up</button>
                </div>
                -------->
            

        </div>
        

    </div>


    <!--------------------- JS  ---------------------->


    <script src="js/bootstrap.js"></script>
    <script src="js/jQ.js"></script>
    <script>
        $(document).ready(function(){

            $('.info').css('display', 'none');

            $('#submit').on( 'click', function() {
                
                var userN1   = $('#name1').val(),
                    userN2 = $('#name2').val(),
                    email = $('#emailPho').val(),
                    password2 = $('#pass').val(),
                    DateB = $('#datB').val(),
                    Location = $('#password').val(),
                    jander = $("#jen").val(),
                    Address = $('#Address').val();
                
                
                //alert("checd mail , " + $("#check1").Selection() );
                if( pseudo == '' || password == '' ){
                    alert("il y'a des champs vides")
                }
                else{
                    $.ajax({
                        url: 'inc/SingUpPHP.php',
                        method: 'post',
                        data:{userN1:userN1,userN2:userN2,email:email,password2:password2,DateB:DateB,Location:Location,jander:jander,Address:Address},
                        success:function(data){
                            if( data == "ok" ){
                                $('.info').css('display', 'block');
                                $('.info').html(data);
                                //window.location.href = 'profile.php';
                                setTimeout("window.location.href = 'profile.php'",2000);
                            }
                            else{
                                $('.info').css('display', 'block');
                                $('.info').html(data);
                            }
                        }
                    });
                }

            } );

            });
    </script>
    <script>

        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");
        var d = document.getElementById("Sing1");
        var d2 = document.getElementById("Sing2");
        

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
            d.style.left = "450px";
            d2.style.left = "450px";
        }
        function Login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
            d.style.left = "450px";
            d2.style.left = "450px";
        }
        
        function Sing1(){
            //if( I.innerHTML === "" ){
                x.style.left = "-750px";
                y.style.left = "-400px";
                d.style.left = "50px";
                //document.getElementById("h").innerHTML = I.Value;
            //}
        }
        function P1(){
            x.style.left = "-400px";
            y.style.left = "50px";
            d.style.left = "450px";
        }
        function N1(){
            //if( check.check ){
                x.style.left = "-1100px";
                y.style.left = "-750px";
                d.style.left = "-400px";
                d2.style.left = "50px";    
            //}
            
        }
        function P2(){
            x.style.left = "-750px";
            y.style.left = "-400px";
            d.style.left = "50px";
            d2.style.left = "450px";
        }

        var p = document.getElementById("phones-btn");
        var e = document.getElementById("email-btn");
        var phone = document.getElementById("phones-div");
        var emai = document.getElementById("email-div");
        var hfb = document.getElementById("form-box").style.height;

        var xx = 1;

        var h = 100;
        var h2 = 530;

        //////////  الـــــــهــــــاتــــــــــف  الهاتف --------////////

        function phon(){
            phone.style.display = "block";
            /*if( xx == 5 || xx + yy == 5 ){
                h2 = h2 + 120;
                document.getElementById("form-box").style.height = h2 + "px";
                h = h + 30;
                document.getElementById("hero").style.height = h + "%";
            }*/
            if( xx <= 5 ){
                test1();
                p.style.display = "none";
                phone.innerHTML += "<div style='margin:0' id='div" + xx + "'><input type='text' id='x" + xx + "' name='x" + xx + "' class='input-field input-field2' placeholder='Phone' required><label for='' onclick='phon();' class='label-field'>+</label><label for='' onclick='div" + xx + ".remove();yy--;delet();" + "' class='label-field' style='color:red;'>-</label></div>";
                /*phone.innerHTML += "<label for='' onclick='phon();' class='label-field'>+</label>";
                phone.innerHTML += "<label for='' onclick='' class='label-field' style='color:red;'>-</label>";
                */
                xx++;
                <?php $x++; ?>;
            }

        }

        //////////  الــــجـــــــــمـــــــيـــــــل   الجبميل --------////////


        var yy = 1;

        function ema(){
            emai.style.display = "block";
            
            /*if( xx + yy == 7 ){
                hfb = "700px";
            }
            if( document.getElementById("form-box").style.height == "890px" ){
                document.getElementById("form-box").style.height = "770px";
            }*/
            //if( yy == 5 || xx + yy == 5 ){
            
            /*if( yy == 5  || xx == 5){
                document.getElementById("form-box").style.height =
            }*/
            if( yy <= 5 ){
                test1();
                e.style.display = "none";
                emai.innerHTML += "<div style='margin:0' id='div" + yy + "'><input type='text' id='y" + yy + "' name='y" + yy + "' class='input-field input-field2' placeholder='email' required><label for='' onclick='ema();' class='label-field'>+</label><label for='' onclick='div" + yy + ".remove();yy--;delet();" + "' class='label-field' style='color:red;'>-</label></div>";
               /* emai.innerHTML += "<input type='text' id='y" + yy + "' class='input-field input-field2' placeholder='email' required>";
                emai.innerHTML += "<label for='' onclick='ema();' class='label-field'>+</label>";
                emai.innerHTML += "<label for='' onclick='div" + yy + ".remove();yy--;" + "' class='label-field' style='color:red;'>-</label>";
                emai.innerHTML += "</div>";*/
                yy++;
                <?php $y++; ?>;
            }

        }


        function test1(){
            if( ( yy > 2 && yy <= 5 ) || ( xx > 2 && xx <= 5 ) || ( xx + yy > 2 && xx + yy <= 10 ) ){
                h2 = h2 + 45;
                document.getElementById("form-box").style.height = h2 + "px";
                h = h + 10;
                document.getElementById("hero").style.height = h + "%";
            }
        }

        var x2 = 1
        var x3 = 1
        function delet(){
            while( x2 <= 5 ){
                try {
                    document.getElementById("div"+x2).id = "div"+x3;
                    x2++;  
                    x3++;  
                } catch (error) {
                    x2++;
                    delet();
                }
                
            }

            if( yy == 1 ){
                emai.style.display = "block";
            }
        }

    </script>

</body>
</html>