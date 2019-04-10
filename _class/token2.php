<?php
session_start();
class token{
  
function Token(){

 //echo $token;
$token =  md5($hoje =  date('s'));
//echo $token; 


echo "
<script>
    (function(){
        sessionStorage.setItem('token','$token');
        setTimeout(apagarToken,'60000'); 
        setInterval(verToken,'1000'); 
        function apagarToken(){
        sessionStorage.setItem('token','');       
       
        }  

        function verToken(){
            if (sessionStorage.getItem('token') === ''){
            alert('favor gerar Outro Token');
        }
        else{
            var token = document.querySelector('#btnToken');
            token.Style.display = 'none';
            console.log(token);
        }
    }
       
    })();

</script>
";
}
}
?>
<input type="button" value="Gerar Token" id="btnToken">
