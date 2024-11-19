<?php
   include_once "./classes/Database.php"; 
//instanciar um obj da classe Database
$database = new Database(); 

//essecutar o metodo getconnection() e armazenando na variavel $db
   $db = $database->getConnection();
?> 