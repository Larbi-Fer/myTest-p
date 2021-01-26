var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");
var s = document.getElementById("si");
var l = document.getElementById("lo");

function register() {
    x.style.marginLeft = "-103%";
    x.style.marginRight = "5%";
    y.style.marginRight = "0%";
    s.style.transform = "rotate(0deg)";
    s.style.opacity = "1";
    l.style.transform = "rotate(-30deg)";
    l.style.opacity = "0";
    z.style.left = "95px";
}

function Login() {
    x.style.marginLeft = "0%";
    x.style.marginRight = "9%";
    y.style.marginRight = "-100%";
    z.style.left = "0";
    s.style.transform = "rotate(70deg)";
    s.style.opacity = "0";
    l.style.transform = "rotate(0deg)";
    l.style.opacity = "1";


}


function tooglecolor() {
    document.querySelector('.hero').classList.toggle('white');

    /*var a = document.querySelector('.submit-btn');
    if( a.innerHTML == "white" ){
        a.innerHTML = "black";
        a.style.background = "#000";
        a.style.color = "#fff";
    }
    else{
        a.innerHTML = "white";
        a.style.background = "#fff";
        a.style.color = "#000";
    }*/
}

function slect() {
    /*country1   = $('#con').val();
    test       = "country";
    $.ajax({
        url: 'inc/SingUpPHP.php',
        method: 'post',
        data:{test:test,country1:country1},
        success:function(data){
            var email = $('#emailPho').val();
            
        }
    });*/
}

$(document).ready(function() {

    var msg = document.querySelector('.msg');
    $('.info').css('display', 'none');
    $('.info1').css('display', 'none');


    ////////// Sing Up / Regester  التسجيل   ////////////

    $('#submit').on('click', function() {

        var userN1 = $('#Fname').val(),
            userN2 = $('#name2').val(),
            email = $('#emailPho').val(),
            password = $('#pass').val(),
            password2 = $('#RPass').val(),
            DateB = $('#datB').val(),
            Location = $('#location').val(),
            jander = $('#jander').val(),
            Address = $('#Address').val(),
            country = $('.contr').text(),
            //country1   = $('#con').val(),
            test = "sing";

        if (userN1 == '' || userN2 == '' || email == '' || password == '' || Location == '' || DateB == '' || Address == '' || country == '') {
            //alert("il y'a des champs vides");
            info("il y'a des champs vides");

        } else if (password != password2) {
            info("Password false", "warn");
        } else if (password.length < 8) {
            info("كلمة السر يجب أن تكون على الأقل 8 خانات");
        } else if (password.length > 15) {
            info("يجب على كلمة السر أن لا تتجوز 14 خانات");
        } else {
            $.ajax({
                url: 'inc/SingUpPHP.php',
                method: 'post',
                beforeSend: function() {
                    toogl(true);
                },
                data: { test: test, userN1: userN1, userN2: userN2, email: email, password: password, DateB: DateB, Location: Location, jander: jander, Address: Address, country: country },
                success: function(data) {
                    //var d = data;
                    toogl(false);
                    var d = data;
                    d = d[0] + d[1];
                    if (d == 'ok' && data.length - 2 == 2) {
                        info(data, "sucsses");
                        /*$('#Fname').val("");
                        $('#name2').val("");
                        $('#emailPho').val("");
                        $('#pass').val("");
                        $('#RPass').val("");
                        $('#datB').val("");
                        $('#location').val("");
                        $('#jander').val("");
                        $('#Address').val("");
                        $('#con').val("");
                        $('#con').val("");*/
                    } else {
                        info(data, "error");
                    }
                }
            });
        }

    });


    ////////// Ligin  تسجيل الدخول   ////////////

    $('#submit1').on('click', function() {


        var email = $('#emailPho1').val(),
            password = $('#pass1').val();

        if (email == '' || password == '') {
            //alert("il y'a des champs vides");
            info("il y'a des champs vides");
        } else {

            $.ajax({
                url: 'inc/loginM.php',
                method: 'post',
                beforeSend: function() {
                    toogl(true);
                },
                data: { email: email, password: password },
                success: function(data) {

                    toogl(false);
                    //$.notify(date,"info");

                    if (data == 'ok') {
                        info(data, "sucsses");
                        setTimeout(() => { window.location.href = "Profile.php"; }, 2000);
                    } else {
                        info(data, "error");
                    }

                }
            });
        }

    });

    var type;
    var bottom = 20;
    var text;
    var xx = 20;

    function info(text, type) {

        var h = document.querySelector('body');
        let ripples = document.createElement('div');
        ripples.classList.add('msg');
        if (type != undefined)
            ripples.classList.add(type);
        ripples.style.bottom = "20px";
        ripples.innerText = text;

        m = document.querySelectorAll('.msg');

        for (let i = 0; i < m.length; i++) {
            //debugger;

            var bo = m[i].style.bottom;
            if (bo[2] != 'p')
                var boo = bo[0] + bo[1] + bo[2];
            else
                var boo = bo[0] + bo[1];
            if (bo[3] != 'p' && bo[3] != 'x')
                var boo = bo[0] + bo[1] + bo[2] + bo[3];
            m[i].style.bottom = (Number(boo) + 60) + "px";
            /*m[i].style.bottom = bottom + "px";
            bottom = bottom + 60;*/
        }
        h.appendChild(ripples);
        /*m.forEach(ms => {
            debugger;
            var bo = ms.style.bottom;
            var boo = bo[0] + bo[1];
            ms.style.bottom = (Number(boo) + 60) + "px";
        });*/





        setTimeout(() => {
            ripples.classList.add('infoo');
        }, 10);

        setTimeout(() => {
            ripples.classList.remove('infoo');
        }, 4000);
        setTimeout(() => {
            ripples.remove();
        }, 4500);
        xx = xx + 60;

    }

    function toogl(toggle) {
        if (toggle) {
            document.querySelector('.rech').classList.toggle("r");
            document.querySelector('.Sing-log').classList.toggle("s");
            var ti = setTimeout(() => { toogl(false);
                info(" لا يوجد إتصال بالأنترنت "); }, 4000);
        } else {
            /*setTimeout(() => {document.querySelector('.rech').classList.remove("r"); }, 500);
            setTimeout(() => {document.querySelector('.Sing-log').classList.remove("s"); }, 500);*/
            document.querySelector('.rech').classList.remove("r");
            document.querySelector('.Sing-log').classList.remove("s");
            clearTimeout(ti);
        }
    }

});

function toggle_class() {
    document.querySelector('.toggle-box').classList.toggle("box");
}

let char;

function set(char) {
    var inp = document.querySelectorAll(char);
    for (let char = 0; char < inp.length; char++) {
        inp[char].value = "";
    }
}