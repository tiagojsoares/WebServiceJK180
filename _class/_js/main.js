

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
                    document.cookie = 'users=' + status;
                    var login = status.split('password=');
                    //console.log(status);
                    document.cookie = ('login=' + login[1]);
                    window.location.reload(1);


                }
                function falha() {
                    alert('Erro');
                }
            }

        });

    }

(function(){
    var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

})();    




 







    function TabelaMostrar() {
        var titulo = document.querySelector('.titulo h2');
        var table = document.querySelector('table');
        var textos = document.querySelectorAll('.accordion');
        //console.log(textos);
        param.addEventListener('click', function (e) {
            e.preventDefault();
            titulo.textContent='Parâmetros';
            for (let i = 0; i < textos.length; i++) {
                textos[i].style.display = 'none';

            }
            table.style.display = 'inline';
            param.style.display = 'none';
            





        });



    }

})();




