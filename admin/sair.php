<?php
    session_start();   
  
    //Limpando os dados da sessão
    unset(
        $_SESSION['nome'],
        $_SESSION['email']
    );   
 
    header("Location: index.php");
?>