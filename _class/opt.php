<?php
class option{

    function action($option,$login,$senha,$tokenG){
        $opt = strtolower($option);
         
         
        switch ($opt) {
            
            case 'gerartoken':
            require_once("token.php");
            
              $token = new token($login,$senha,$tokenG);           
              return $token->Token($login,$senha,$token);
                break;
        
                case 'inserir':
                
                //$_SESSION['login']=$login;
                //$_SESSION['senha']=$senha;
                $_SESSION['token']=$tokenG;
                $_SESSION['opt']=$opt;
                
                 
                return require_once("consultaToken.php");      
                break;
        
                /////Caso Delete
                case 'deletar':
                $_SESSION['login']=$login;
                $_SESSION['senha']=$senha;
                $_SESSION['token']=$tokenG;
                $_SESSION['opt']=$opt; 
                        
                return require_once("consultaToken.php");       

                break;

            case 'incluiracesso':
            $_SESSION['login']=$login;
            $_SESSION['senha']=$senha;
            $_SESSION['token']=$tokenG;
            $_SESSION['opt']=$opt; 
            return require_once("consultaToken.php");
            break;

            case 'excluiracesso':
            
            $_SESSION['login']=$login;
            $_SESSION['senha']=$senha;
            $_SESSION['token']=$tokenG;
            $_SESSION['opt']=$opt; 
            
            return require_once("consultaToken.php");

            case 'alterar':
            $_SESSION['login']=$login;
            $_SESSION['senha']=$senha;
            $_SESSION['token']=$tokenG;
            $_SESSION['opt']=$opt; 
            
            return require_once("consultaToken.php");
            
            break;
            case 'cartaoinserir':
            $_SESSION['login']=$login;
            $_SESSION['senha']=$senha;
            $_SESSION['token']=$tokenG;
            $_SESSION['opt']=$opt; 
            
            return require_once("consultaToken.php");

            
            break;

            case 'cartaodeletar':
            $_SESSION['login']=$login;
            $_SESSION['senha']=$senha;
            $_SESSION['token']=$tokenG;
            $_SESSION['opt']=$opt; 
            
            return require_once("consultaToken.php");

            
            break;
            case 'cartaoalterar':
            $_SESSION['login']=$login;
            $_SESSION['senha']=$senha;
            $_SESSION['token']=$tokenG;
            $_SESSION['opt']=$opt; 
            
            return require_once("consultaToken.php");

            
            break;
            default:

            return "<ERRO> Digite uma Action Valida </ERRO>";
                break;

        }
    }
}