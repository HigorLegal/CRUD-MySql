<?php
include_once './config/config.php';
include_once './classes/Usuario.php';

//e so ler que tu entende
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = new Usuario($db);

    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $fone = $_POST['fone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario->registrar($nome, $sexo, $fone, $email, $senha);

    header('Location: index.php');

    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Usuário</title>
</head>
<body>
    <h1>Adicionar Usuário</h1>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br><br>
        <label>Sexo:</label>
        <label for="masculino">
            <input type="radio" id="masculino" name="sexo" value="M" required> Masculino
        </label>
        <label for="feminino">
            <input type="radio" id="feminino" name="sexo" value="F" required> Feminino
        </label>
        <br><br>
        <label for="fone">Fone:</label>
        <input type="text" name="fone" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <br><br>
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>
