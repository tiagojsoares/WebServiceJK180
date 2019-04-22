

(function () {
    
    TabelaMostrar();
    window.onload;
    (function main() {
        var btnlogin = document.querySelector('#login');
        btnlogin.addEventListener('click', function (e) {
            e.preventDefault();
            ////Chamando a Função Login/////
         
            login();
        });      
        
        ////Chamando A função Logout        
     
      
               

    })();


    ///////////////////////////////////////
    /////////////////////////////////////
    /////////////////FUnções////////////
    function login() {
        

        var formlogout = document.querySelector('.log');
        var btnEnviar = document.querySelector('#enviar');
        formlogout.style.display = 'block';
        btnEnviar.addEventListener('click', function () {
            var user = document.querySelector('#user');
            var senha = document.querySelector('#password');
            $('#form').submit(function (e) {
                e.preventDefault();
                var formulario = $(this);
                var retorno = inserirForm(formulario, 'function=login');
                sessionStorage.setItem('temp', formulario.serialize());
                //console.log(formulario.serialize());
            });

            

            

            function inserirForm(dados, funcao) {
                $.ajax({
                    type: "POST", data: dados.serialize(), url: "/_class/_dbm/User.php?&" + funcao, async: false
                }).then(sucesso, falha);
                function sucesso(data) {
                    
                    sessionStorage.setItem('login', data);
                    var status = sessionStorage.getItem('temp');
                    document.cookie='users='+status;               
                    var login = status.split('password=');
                    //console.log(status);
                    document.cookie= ('login='+login[1]);
                    window.location.reload(1);
                   
                    
                }
                function falha() {
                    alert('Erro');
                }
            }
           
        });
       
    }
    function logout() {
        var usuario = document.querySelector('#new');
        var logout = document.querySelector('#logout');
        var formlogout = document.querySelector('.log');
        usuario.style.display = 'none';
        logout.style.display = 'none';
        formlogout.style.display = 'none';   
        //console.log('logout');
               
        
    }

    
function TabelaMostrar(){

var table = document.querySelector('table');
param.addEventListener('click',function(e){
e.preventDefault();
    
    table.style.display='block';
    param.style.display='none';
    esconder.style.display='block';
   
   
});



    }
  
})();




