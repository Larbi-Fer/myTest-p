<?php
session_start();
if( isset($_SESSION['email']) ){
    header("Location: profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssFile.css">
    <title>Sing Up or Login</title>
    
    <style>
        .select{
            color: #fff;
            
            position: relative;
            cursor: pointer;
            z-index: 1000;
        }
        .selected{
            
            padding: 10px;
        }
        .options{
            position: absolute;
            width: 100%;
            top: 50px;
            max-height: 300px;
            overflow: auto;
            transform: perspective(1000px) rotateX(10deg);
            opacity: 0;
            transition: .5s;
            display: none;
            visibility: hidden;
        }
        .select.active .options{
            transform: perspective(1000px) rotateX(0deg);
            top: 60px;
            opacity: 1;
            visibility: visible;
        }
        .options .option{
            background: #021046;
            padding: 5px 20px;
            transition: .7s;
            overflow: hidden;
        }
        .options .option:hover{
            background: #040d30;
            transition: .2s;
        }
        .options .search{
            padding: 0 !important;
            text-align: center;
            background: #021046;
        }
        
        .options .search input{
            width: 88%;
            height: 100%;
            padding: 4px;
            font-size: 19px;
            margin-top: 4px;
            outline: none;
            background: transparent;
            color: #fff;
        }
    </style>

</head>
<body>
    
<div class="hero">
    <!-- <button class="submit-btn submit-btn-1" style="float: right;width: 60px;
    background: #fff;color: #000;margin-top: 5px;" onclick="tooglecolor();">
    white</button>-->
    <div class="toggle-box box" onclick="toggle_class();tooglecolor();">
        <div class="circle"></div>
    </div>
    <div class="titel">
        <div class="icon">
            <h1>greqfsd</h1>
            <img src="img/w.png" alt="">
        </div>
    </div>

    <div class="Sing-log login">
        <div class="rech">            
        </div>
        <div class="SL">
            <h1 class="Sing" id="si">Sing Up</h1>
        </div>
        <div class="SL">
            <h1  class="Login" id="lo">&nbsp;&nbsp;&nbsp;&nbsp;Login</h1>
        </div>
        <div class="button">
            <div class="button-box">
                <div id="btn"></div>
                <div id="btn1"></div>
                <button class="toggle-btn" onclick="Login();">Log In</button>
                <button class="toggle-btn" onclick="register();">Register</button>
            </div>
        </div>
        <div class="form-group1">
        
            <!-------   Log In  ----------->

            <div id="login">
                
                <div class="input-field1" style="margin-left: 15px;">
                    <input type="text" id="emailPho1" class="input-field input-field-2"  required>
                    <label>E-mail or Phone</label>
                </div>
                 
                
                <div class="input-field1" style="margin-left: 15px;">
                    <input type="password" id="pass1" class="input-field input-field-2"  required>
                    <label>Password</label>
                </div>
                
                
                <div>
                    <br><br><br><br>
                    <button class="submit-btn submit-btn-1" id="submit1">Login</button>
                </div>


            </div>

            <!-------   Sing Up  ----------->

            <div id="register">
                <!-------   form 1  ----------->
                <div class="form-grp">
                    <div class="input-field1">
                        <input type="text" id="Fname" class="input-field"  required>
                        <label>First Name</label>
                    </div>
                    <div class="input-field1">
                        <input type="text" id="name2" class="input-field"  required>
                        <label>last Name</label>
                    </div>
                
                
                    <div class="input-field1">
                        <input type="text" id="emailPho" class="input-field"  required>
                        <label>Email or Phone</label>
                    </div>
                    <div class="input-field1">
                        <input type="password" id="pass" class="input-field"  required>
                        <label>Password</label>
                    </div>
                
                
                    <div class="input-field1">
                        <input type="password" src="img/f2.png" id="RPass" class="input-field"  required>
                        <label>Retype the Password</label>
                    </div>
                    <div class="input-field1">
                        <form  action="" class="td" method="POST">
                            <!--
                            <input type="radio" name="j" value="mail" id="mail" checked><label for="mail" class="lbl">mail</label>
                            <input type="radio" name="j" value="femail" id="femail"><label for="femail" class="lbl">femail</label>
                            -->
                            <select name="" id="jander" class="input-field">
                                <option value="mail" style="color:#000">mail</option>
                                <option value="femail" style="color:#000">femail</option>
                            </select>
                            <label for="">J :</label>
                        </form>
                    </div>
                </div>

                <!-------   form 2  ----------->

                <div  class="form-grp">
                    <div class="input-field1">
                        <!-- <select onchange="slect();" type="text" id="con" class="input-field" >-->
                            


                            <div class="select">
                                <div class="selected input-field contr">Country</div>
                                <div class="options">
                                    <div class="search"> <input type="text" onclick="selected()" id="search" placeholder="Search"> </div>

                                    <?php
                                        require_once( "inc/coon.php" );
                                        $select = mysqli_query( $coon, "SELECT * FROM telephone" )
                                        or die( mysqli_error($coon) );
                                        while ( $op = mysqli_fetch_assoc( $select ) ) {
                                            //if( $op["country"] == "Algeria" )
                                                echo "<div class='option' onclick='selected(this.innerText)'>". $op["country"] ."</div>\n                            ";
                                            //else
                                                //echo "<option value='". $op["country"] ."'>". $op["country"] ."</option>\n                            ";
                                        }
                                    ?>
                                </div>
                            </div>




                        
                        <label class="input-field-hov" style="z-index: 100000000;">country</label>
                    </div>
                    <div class="input-field1">
                        <input type="text" id="Address" class="input-field"  required>
                        <label>Address</label>
                    </div>
                    <div class="input-field1">
                        <input type="text" id="location" class="input-field"  required>
                        <label>Place of origin</label>
                    </div>
                    <div class="input-field1">
                        <input type="date" id="datB" class="input-field"  required>
                        <label class="input-field-hov">Date of Birth</label>
                    </div>
                
                
                    
                    <div>
                        <br>
                        <button class="submit-btn submit-btn-1" id="submit">Sing Up</button>
                    </div>
                
                
                    <div>
                        
                    </div>
                </div>

            </div>

        </div>
        
    </div>
    
    <!--<div class="msg">
        massge Test 
    </div>-->
    
</div>

<script src="js/JQ.js"></script>

<script src="inc/js.js"></script>

<script>
    $(document).ready(function() {
            $("#search").on("keyup", function() {debugger;
                var value = $(this).val().toLowerCase();
                $(".options .option").filter( function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                } );
            });
        } ) 


var s = document.querySelector('.select');
let bool = true;
s.addEventListener( 'click' , function(){
    if( bool ){
        document.querySelector('.options').style.display = 'block';
        setTimeout(() => {
            this.classList.add('active');
        }, 0);
        setTimeout(() => {
            window.search.focus();
        }, 200);
        bool = false;
    }
    else{
        this.classList.remove('active');
        setTimeout(() => {
            document.querySelector('.options').style.display = 'none';
        }, 500);
        bool = true;
    }
    
} );

        function toggleSelect(){
            /*if( bool ){
                document.querySelector('.options').style.display = 'block';
                setTimeout(() => {
                    this.classList.add('active');
                }, 0);
                
                bool = false;
            }
            else{
                this.classList.remove('active');
                setTimeout(() => {
                    document.querySelector('.options').style.display = 'none';
                }, 500);
                bool = true;
            }*/
        }
        function selected(text){
            if( text != undefined )
                document.querySelector('.selected').innerText = text;
            //s.classList.remove('active');
            if( text == null )
                bool = true;
        }
</script>

</body>
</html>