<?php
    session_start();
    if( !isset( $_SESSION["email"] ) ){
        header("Location:sing.php");
    }
    require_once "inc/coon.php";
    $id = $_SESSION['empno'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "profile " . $_SESSION['Name'] ?></title>
    <link rel="stylesheet" href="http://localhost/myApp/css/bootstrap.css">
    <link rel="stylesheet" href="cssFile.css">
    <link rel="stylesheet" href="inc/NavCss.css">
    <style>
        /*body{
            padding-right: 230px;
        }*/
        *{
            transition: .5s;
        }
        .img-pr{
            width: calc(100% + 10px);
            position: relative;
            height: 200px;
            background-color: #111;
            margin-left: -10px;
            margin-bottom: 140px;
        }
        .img-user{
            width: 200px;
            height: 200px;
            border-radius: 50%;
            position: absolute;
            top: 180px;
            left: 50%;
            transform: translate(-50%,-50%);
            border: 4px solid #525252;
        }
        .user{
            position: absolute;
            top: 285px;
            left: 50%;
            font-size: 30px;
            font-weight: 800;
            transform: translate(-50%,0%);
        }
        body{
            min-height: 1000px;
        }
        .list-group-2{
            position: absolute;
            width: 230px;
            height: 100%;
            top: 273px;
            right: 0;
            background: #292929;
            transition: 0s !important;
        }
        .list-group-2.fix{
            position: fixed;
            top: 0;
        }
        ::-webkit-scrollbar-button{
            background: #272727;
        }

        .man{
            margin-right: 240px;
        }
        .text{
            background: #272727;
            padding: 5px 10px;
            font-size: 17px;
        }
    </style>
</head>
<body style="background: none">
    <?php require_once "inc/navbar.html"; ?>
    <!--<h1> Hello </h1>

    <button onclick="copyTextToClipboard('Test copy')">Test</button>
    
<h2 id="hhh" style="position: fixed;top: 80px;right: 0;z-index: 100000000000;">Test</h2>-->
<div class="img-pr">
    <img src="img/img1.jpg" alt="" class="img-user" draggable="false">
    <div class="user"><?php echo $_SESSION['Name'] ?></div>
</div>
<div class="list-group-2">

</div>
<div class="man" dir="rtl">
    <textarea name="" class="text" cols="30" rows="10"></textarea>
</div>



    <script src="js/JQ.js"></script>

<script src="inc/js.js"></script>
<script src="js/bootstrap.js.js"></script>
<script src="inc/NavJS.js"></script>

<!-- ↓ مهم في الصفحات -->

<script src="profile.js"></script>

<!-- ↑ مهم في الصفحات -->

<script>

ListG();    
var lastScrollTop = 0;
window.addEventListener( 'scroll' , function(){
    var scrollTop = window.pageXOffset || document.documentElement.scrollTop;
    if( scrollTop > lastScrollTop ){
        document.querySelector('.silder-menue').style.left = "-275px";
        document.querySelector('.nav-1').style.top = "-90px";
        document.querySelector('.amis-list').style.paddingTop = "10px";
        toggleClassList('.g-1','active','del');
        toggleClassList('.g-2','active','del');
    }
    else{//min-height: 1000px;
        document.querySelector('.nav-1').style.top = "0";
        document.querySelector('.silder-menue').removeAttribute('style');
        document.querySelector('.amis-list').removeAttribute('style');
        //toggleClassList('.g-1','active','add');
    }
    ListG();
    lastScrollTop = scrollTop;
} )

function ListG(){
    document.querySelector('.list-group-2').classList.toggle('fix', window.scrollY > 270)
}

</script>


</body>
</html>