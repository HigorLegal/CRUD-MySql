<?php
session_start();

include_once './config/config.php';
include_once './classes/Usuario.php';
include_once './classes/noticia.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}
//e so ler que tu entende
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $noticias = new noticia($db);

    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $noticia = $_POST['noticia'];
    $imagem = "./imagens/".$_POST['imagem'];

    $noticias->registrar( $titulo,$_SESSION['usuario_id'],$data, $noticia,$imagem );

    header('Location: gerenciador.php');

    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar noticia</title>
</head>
<body>
    <main>
    <h1>cadastrar noticia</h1>
    
    <form method="POST">
        <label for="titulo">titulo:</label>
        <input type="text" name="titulo" required>
        <br><br>
        <label for="data">data:</label>
        <input type="date" name="data" required>
        <br><br>
        <label for="noticia">informaçoes da noticia:</label>
        <input type="text"name="noticia" required>
        <br><br>
        <label for="imagem">imagem da noticia:</label>
        <input type="file" name="imagem" id="imagem" required>
        <br><br>
        <input type="submit" value="Adicionar">
    </form>
    </main>
</body>

</html>
<style>
    
    *{
        margin:0;
    }
    body {
        background-color: #a395c5;
    }
</style>