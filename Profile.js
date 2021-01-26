add("emp","");
        add("iami","");
        add("ami","");
        var d;
        var s;
        var ot;


        function ami(d,s){
            //debugger;
            if( s == "i" ){
                ot = "ami";
            }
            else if( s == "d" ){
                ot = "amid";
            }
            else if( s == "iAmi" ){
                ot = "iAmi";
            }
            else if( s == "dAmi" ){
                ot = "amid";
            }
            $.ajax({
                url: 'inc/other.php',
                method: 'post',
                data:{ot:ot,id:d},
                success:function(data){
                    
                    info(data,"sucsses");
                    add("emp","");
                    add("iami","");
                    add("ami","");
                }
            });
        }

        function info(text,type){
    
            var h = document.querySelector('body');
            let ripples = document.createElement('div');
            ripples.classList.add('msg');
            if( type != undefined )
                ripples.classList.add(type);
            ripples.style.bottom = "20px";
            ripples.innerText = text;
            
            m = document.querySelectorAll( '.msg' );
            
            for (let i = 0; i < m.length; i++) {
                //debugger;
                
                    var bo = m[i].style.bottom;
                    if( bo[2] != 'p' )
                        var boo = bo[0] + bo[1] + bo[2];
                    else
                        var boo = bo[0] + bo[1];
                    if( bo[3] != 'p' && bo[3] != 'x' )
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
    
}

function add(add,sea){
    if( sea != '' ){
        $.ajax({
        url: 'inc/ajax.php',
        method: 'post',
        data:{add:add,search:sea},
        success:function(data){  
            $('.list-search').html(data);
        }

        });
    }

    else{
        $.ajax({
        url: 'inc/ajax.php',
        method: 'post',
        data:{add:add},
        success:function(data){
            /*if( add == "emp" )
                $('#emp').html(data);*/
            if( add == "iami" ){
                $('#iami').html(data);
                del();
            }
            else if( add == "ami" ){
                $('#ami').html(data);
                addAmi();
            }
            }
        });
    }
}

function resSear(va){//resSear
    $.ajax({
        url: 'inc/ajax.php',
        method: 'post',
        data:{add:"emp",va:va},
        success:function(data){

            //$('.list-search').html("");
            $('.list-search').html(data);
            document.querySelector( '.list-search' ).classList.add( 'active' );


        }
    });
}

//setTimeout(() => {
function del(){
        const delet = document.querySelectorAll('#Delete');
        delet.forEach(del => {
            del.addEventListener( 'click' , function() {
                /*var dd = this.getAttribute('data-id');
                document.write(dd);*/
                ami(this.getAttribute('data-id'), 'dAmi');
            } )

        })
}

function addAmi(){
        const add = document.querySelectorAll('#Add');
        add.forEach(addd => {
            addd.addEventListener( 'click' , function() {
                /*var dd = this.getAttribute('data-id');
                document.write(dd);*/
                ami(this.getAttribute('data-id'), 'iAmi');
            } )

        })
}


function copyTextToClipboard(text) {
  var input = document.createElement("input");

  /*input.style.position = 'fixed';
  input.style.top = 0;
  input.style.left = 0;
  input.style.width = '2em';
  input.style.height = '2em';
  input.style.padding = 0;
  input.style.border = 'none';
  input.style.outline = 'none';
  input.style.boxShadow = 'none';
  input.style.background = 'transparent';*/
  input.value = text;
  document.body.appendChild(input);
  input.select();
  try {
    var successful = document.execCommand('copy');
    //var msg = successful ? 'successful' : 'unsuccessful';
    //console.log('Copying text command was ' + msg);
  } catch (err) {
    console.log('Oops, unable to copy');
  }
  document.body.removeChild(input);
}

