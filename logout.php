<?php
   session_start();
   //destroi a seçao do usuario logado(basicamente ele tem que logar denovo se nao ele nao pode entrar)
   session_destroy();
   
   header('Location: index.php');
   exit();
?>
