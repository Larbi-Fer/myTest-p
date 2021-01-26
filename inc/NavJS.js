var chatNum = 1;
    function mess(emp){
        if( chatNum == 4 ){
            
            var chatar = document.querySelectorAll('.chat');
            chatar[0].remove();
            for (let chatN = 1; chatN < 3; chatN++) {
                var cc = chatN + 1;
                chatar[chatN].classList.remove( 'chat-' + ( cc ) );
                chatar[chatN].classList.add( 'chat-' + chatN );
            }
            chatNum--;
            mess(emp);
        }
        else{
            var h = document.querySelector('body');
            let ripples = document.createElement('div');
            ripples.classList.add( "chat-" + chatNum );
            ripples.classList.add( 'chat' )
            //ripples.style.bottom = "20px";
            ripples.innerText = chatNum;
            h.appendChild(ripples);
            chatNum++;
        }
    }

    document.onkeydown = function(e){
        var key_code = e.keyCode;
        var key_press = String.fromCharCode(e.keyCode);
        //window.hh.innerHTML = "code: " + key_code + "; press: " + key_press;
    }

    let bool = true;
    function toggleClass(className,classToggle){
        document.querySelector( className ).classList.toggle( classToggle );
    }
    function toggleClassList(className,classToggle,toog){
        try {
            if( toog == "toogle" )
            document.querySelector( className ).classList.toggle( classToggle );
            else if( toog == "add" ){
                var clN = document.querySelector( className )
                if( clN != null )
                    clN.classList.add( classToggle );
            }
            else if( toog == "del" ){
                var clN = document.querySelector( className )
                if( clN != null )
                    clN.classList.remove( classToggle );
            }   
        } catch (error) {
            
        }
    }


    var s = window.search;
    var ser = window.search;
    var i1;

    s.addEventListener('blur',function(){
        if( this.value == '' && !bool ){
            toggleClass('.search','active');
            bool = true;
        }
        document.querySelector( '.list-search' ).classList.remove( 'active' );
    });


    s.addEventListener('focus',function(){
        if( ser.value != '' ){
            document.querySelector( '.list-search' ).classList.add( 'active' );
        }
    });


    document.getElementById('search1').addEventListener('click',function(){
        if( bool ){
            toggleClass('.search','active');
            bool = false;
        }
        else{
            resSear(ser.value);
        }
        window.search.focus();
    });


var cliUpDow = 0;

    s.addEventListener( 'keyup' , function(e){
        if( window.search.value == '' ){
            document.querySelector( '.list-search' ).classList.remove( 'active' );
        }
        else{
            var c = e.keyCode;
            if( !( c == 8|| c == 38 || c == 39 || c == 40 || c == 37 ||  c == 9 ||  c == 16 ||  c == 20 ||  c == 17 ||  c == 18 ||  c == 93  ) ){
                add( 'empS' , ser.value );
                document.querySelector( '.list-search' ).classList.add( 'active' );
            }
            if( c == 40 ){ // down
                var lis = document.querySelectorAll('.list-s');
                if( cliUpDow != 0 && cliUpDow != lis.length )
                    lis[cliUpDow - 1].classList.remove('hov');
                if( cliUpDow != lis.length ){
                    lis[cliUpDow].classList.add('hov');
                    var serc = lis[cliUpDow].innerHTML;
                    ser.value = serc;
                    cliUpDow++;
                }
            }
            else if( c == 38 ){ // up
                if( cliUpDow != 0 )
                    cliUpDow--;
                var lis = document.querySelectorAll('.list-s');
                if( cliUpDow != lis.length )
                    lis[cliUpDow].classList.remove('hov');
                if( cliUpDow != 0 ){
                    lis[cliUpDow - 1].classList.add('hov');
                    var serc = lis[cliUpDow - 1].innerHTML;
                    ser.value = serc;
                }
            }
            
            if( c == 13 ){
                resSear(ser.value);
                cliUpDow = 0;
            }
            if( c == 8 ){
                cliUpDow = 0;
            }
        }
    } )

    document.querySelector('.list-search').addEventListener( 'mouseover' , function(){
        try{
            document.querySelector('.hov').classList.remove('hov');
            cliUpDow = 0;
        }
        catch(error){

        }
    } )
    /*const list = document.querySelectorAll('.list-group-1');
    list.forEach(lis => {
        lis.addEventListener( 'click' , function(){
            //toggleClass( '' , 'active' )
            this.classList.toggle( 'active' );
        } )
    });*/
    
window.sendID.addEventListener( 'click' , function(){
    debugger;
    send();
} )

function send(){
    debugger;
    var  txt = window.textSend.value;
    //document.write(txt)
    $.ajax({
        url: 'inc/ajax.php',
        method: 'post',
        data:{add:"sen",i:i1,txt:txt},
        success:function(data){

            //$('.list-search').html("");
            info( data );

        }
    });
}

var scrollTop1;
var msgTest = 0;
//////// إظهار الرسائل ///////////
function msg(ii){
    var m = document.querySelector('.chat-primery');
    $.ajax({
        url: 'inc/ajax.php',
        method: 'post',
        data:{add:"msg",i:ii,chat:m.innerHTML},
        success:function(data){
            //debugger;
            if( msgTest != 0 ){
                var ch = document.querySelector('.massge');
                scrollTop1 = ch.scrollTop;
            }
            //if( data != m.innerHTML )
                document.querySelector('body').innerHTML += data;
                /*m.innerHTML = data;
            var ch = document.querySelector('.massge');
            //document.getElementById('inpH').value;
            i1 = document.getElementById('inpH').getAttribute('data-emp');
            
            
            if( msgTest == 0 || ch.scrollTop == scrollTop1 ){
                ch.scrollBy(0,ch.scrollHeight-188);
                scrollTop1 = ch.scrollTop;
                
            }
            else{
                ch.scrollBy(0,scrollTop1);
            }*/
            
            /*else{
                ch.scrollBy(0,scrollTop1);
            }*/

            /*if( ch.scrollTop == ch.scrollHeight-188 ){
                ch.scrollBy(0,ch.scrollHeight-188);
            }*/
            

            
            /*if( ch.scrollTop == ch.scrollHeight-188 ){  
                info('ok ' + ch.scrollHeight + ' ' + ch.scrollY);
            }
            else{
                
                info('no ok ' + ch.scrollHeight + ' ' + ch.scrollTop)
                
            }*/
                
            /*ch.scrollTo({
                top: ch.scrollHeight,
                behavior: 'smooth'
            })*/
            //info( data );
            
            /*if( msgTest == 0 ){
                setInterval(() => {
                    msg(ii);
                }, 1500);
                msgTest++; 
            }*/
        }
    });
}
document.getElementById('test').addEventListener( 'click', function(){
    var ch = document.querySelector('.massge');
    info( scrollTop1 + " " + ch.scrollTop );
} ) ;


function amiList(){
    $.ajax({
        url: 'inc/ajax.php',
        method: 'post',
        data:{add:"amiL"},
        success:function(data){  
            $('.list-search').html(data);
        }

    });
}

amiD();
function amiD(){
    $.ajax({
        url: 'inc/ajax.php',
        method: 'post',
        data:{add:"empD"},
        success:function(data){  
            document.querySelector('.amis').innerHTML = data;
        }

    });
}

