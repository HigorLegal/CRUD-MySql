<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}
include_once './config/config.php';
include_once './classes/Usuario.php';
include_once './classes/noticia.php';


$noticia = new noticia($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $noticia->deletar($id);
    header('Location: gerenciador.php');
    exit();
}
?>
