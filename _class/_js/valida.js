(function(){
    
    var usuario = document.querySelector('#new');    
    var logout = document.querySelector('#logout');
    var login = document.querySelector('#login');
    var btnNew = document.querySelector('#new');
     
    login.style.display='none';
    logout.style.display='block';
    usuario.style.display='block';
    param.style.display='block';
    tutorial.style.display='none';

    logout.addEventListener('click',function(){
        sessionStorage.clear(); 
        login.style.display='block';
        logout.style.display='none';  
        document.cookie="login=";
        document.cookie="users=";
        window.location.reload(1);
    }); 

btnNew.addEventListener('click',function(e){
    e.preventDefault();
    var user = document.querySelector('#userNew');
    var senha = document.querySelector('#passwordNew');
    var form = document.querySelector('.logNew');
    form.style.display='block';

    $('#formNew').submit(function (e) {
        e.preventDefault();
        var formulario = $(this);
        var retorno = inserirForm(formulario, 'function=inserir');
        //sessionStorage.setItem('temp', formulario.serialize());
        //console.log(formulario.serialize());

        function inserirForm(dados, funcao) {
            $.ajax({
                type: "POST", data: dados.serialize(), url: "/_class/_dbm/User.php?&" + funcao, async: false
            }).then(sucesso, falha);
            function sucesso(data) {               
              console.log(data);
                //window.location.reload(1);
               
                
            }
            function falha() {
                alert('Erro');
            }
        }



        
    });

    //console.log(user);


});

   


})();






