<?php
class option{

    function action($option,$login,$senha,$tokenG){
         $opt=$option;

        switch ($opt) {
            case 'gerarToken':
            require_once("token.php");
            
              $token = new token($login,$senha,$tokenG);           
              return $token->Token($login,$senha,$token);
                break;
        
                case 'inserir':
                require_once("_class/consultaToken.php");
               //echo 'Inserir um novo funcionario';
                break;
        
                /////Caso Delete
                case 'deletar':
                $_SESSION['login']=$login;
                $_SESSION['senha']=$senha;
                $_SESSION['token']=$tokenG;
                $_SESSION['opt']=$opt;              
                return require_once("consultaToken.php");
                

                             
                
                
                break;
            
            default:
            return "<ERRO>Digite uma 'Action' Válida</ERRO>";
                break;

        }
    }
}
