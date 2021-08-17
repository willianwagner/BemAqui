<?php

require __DIR__ . "../source/autoload.php";

use Source\Database\Connect;
session_start();
$pdo1 = Connect::getInstance();

if((isset($_POST['email'])) && (isset($_POST['senha']))){
    $usuario = $_POST['email']; 
    $senha = $_POST['senha'];
    $senha = md5($senha);

        
  $resultado = $pdo1->query("SELECT * FROM user WHERE email = '$usuario' && senha = '$senha' LIMIT 1")->fetch(PDO::FETCH_ASSOC);
  //Validando se o usuário existe e iniciando a conexao

  if(is_null($resultado['nome'])){
      //Usuário não encontrado
      $_SESSION['loginErro'] = "Usuário ou senha inválido";
      header("Location: ../index.php");
  
    }else{    
         
        //Logando usuário
      $_SESSION['nome'] = $resultado['nome'];
      
      header("Location: ../admin/index.php");
    }

}else{
    header("Location: ../adm.php");
}



