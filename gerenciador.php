<?php
session_start();
include_once './config/config.php';
include_once './classes/noticia.php';
include_once './classes/usuario.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}

$noticia = new noticia($db);
$dados = $noticia->ler();

// Obter dados do usuário logado


// Obter dados dos usuários
if (isset($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $noticia->deletar($id);
    header('Location: gerenciador.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador</title>
</head>
<body>
    <header>

<img src="" alt="">
    </header>
    <a href="logout.php">sair</a>
    <a href="portal.php">gerenciador de usuarios</a>
    <a href="cadastrarNot.php">criar noticia</a>
<table border="1">
        <tr>
            <th>ID</th>
            <th>titulo</th>
            <th>data</th>
            <th>autor</th>
            <th>data</th>
            <th>noticia</th>
            <th>foto</th>
            <th>ações</th>
        </tr>
        <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo ($row['data']);?></td>
                <td><?php echo $row['autor']; ?></td>
                <td><?php echo $row['data']; ?></td>
                <td><?php echo $row['noticia']; ?></td>
                <td><?php echo $row['foto']; ?></td>
                <td>
                    <a href="editarNot.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="deletarNot.php?id=<?php echo $row['id']; ?>">Deletar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>