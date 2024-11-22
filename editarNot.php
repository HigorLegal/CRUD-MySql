<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}
include_once './config/config.php';
include_once './classes/Usuario.php';
include_once './classes/noticia.php';


$noticias = new noticia($db);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $data = $_POST['data'];
    $noticia = $_POST['noticia'];
    $foto = "./imagens/".$_POST['foto'];
    $noticias->atualizar($id,$titulo,$autor,$data,$noticia,$foto);
    header('Location: gerenciador.php');
    exit();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = $noticias->lerPorId($id);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="root.css">
</head>
<body>
    <h1>Editar Usuário</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="titulo">Nome:</label>
        <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required>
        <br><br>
        <label>autor:</label>
        <input type="text" name="autor" value="<?php echo $row['autor']; ?>" required>
        <br><br>
        <label>informaçoes da noticia:</label>
        <input type="text" name="noticia" value="<?php echo $row['noticia']; ?>" required>
        <br><br>
        <label for="data">data:</label>
        <input type="date" name="data" value="<?php echo $row['data']; ?>" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="file" name="foto" value="<?php echo $row['foto']; ?>" required>
        <br><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
