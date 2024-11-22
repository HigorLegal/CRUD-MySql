<?php
session_start();
include_once './config/config.php';
include_once './classes/Usuario.php';


// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}
$usuario = new Usuario($db);


// Processar exclusão de usuário
if (isset($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $usuario->deletar($id);
    header('Location: portal.php');
    exit();
}

// Obter dados do usuário logado
$dados_usuario = $usuario->lerPorId($_SESSION['usuario_id']);
$nome_usuario = $dados_usuario['nome'];
// Obter dados dos usuários
$dados = $usuario->ler();
// Função para determinar a saudação
function saudacao() {
    $hora = date('H');
    if ($hora >= 6 && $hora < 12) {
        return "Bom dia";
    } elseif ($hora >= 12 && $hora < 18) {
        return "Boa tarde";
    } else {
        return "Boa noite";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Portal</title>
    <link rel="stylesheet" href="root.css">
</head>
<body>
    <header><h1>gerenciamento de usuarios</h1></header>
    <h1 id="msg"> <?php echo saudacao() . ", <b>" . $nome_usuario."</b>"; ?>!</h1>
    <div id="links">
    <a href="registrar.php">Adicionar Usuário</a>
    <a href="gerenciador.php">gerenciar noticias</a>
    <a href="logout.php">Logout</a>
    </div>
    <br>
<main>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Fone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo ($row['sexo'] === 'M') ? 'Masculino' : 'Feminino'; ?></td>
                <td><?php echo $row['fone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                <a href="deletar.php?id=<?php echo $row['id']; ?>"><img id="imgalt"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcx1AupvWZqkA2_GijfJIDCsc1xCNXVNOkDQ&s" alt=""></a>
                <a href="editar.php?id=<?php echo $row['id']; ?>"><img id="imgex" src="https://cdn.pixabay.com/photo/2017/06/06/00/33/edit-icon-2375785_640.png" alt=""></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    </main>
</body> </html>

<style>

#msg{
    margin-bottom: 20px; 
}
 b{
    color: blue;

 }
 main{
        display: flex;
        
justify-content: center
    }
    table{
        margin-top: 50px;
        background-color: black;
        color: white;
    border-color: black;
    }
 #links a{
    background-color: black;
        color: white;
        text-decoration: none;
        font-size: 20px;
        padding: 10px;
        border-radius: 30px;
        
}
 table img{
    margin-left: 10px;
        border: 3px solid white;
        border-radius: 100%;
        width: 30px;
        height  : 30px;
        

 }
</style>