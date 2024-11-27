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
    <link rel="stylesheet" href="root.css">
</head>

<body>
    <header>
        <h1>cadastrar Usuário</h1>
    </header>
    <a href="portal.php">voltar</a>
    <main>
        <img id="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSE1celiaX-o-k4pxKqTtoCIvGYVil4ilQXqoqQ7SihOtZbHpYy34Jlmgrw7bJvww9hZE8&usqp=CAU" alt="">
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>

            <label>Sexo:</label>
            <div>
                <label for="masculino">
                    <input type="radio" id="masculino" name="sexo" value="M" required> Masculino
                </label>
                <label for="feminino">
                    <input type="radio" id="feminino" name="sexo" value="F" required> Feminino
                </label>
            </div>

            <label for="fone">Fone:</label>
            <input type="text" name="fone" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>

            <input id="button" type="submit" value="Adicionar">
        </form>
    </main>
</body>

</html>
<style>
  a{
    background-color: black;
        color: white;
        text-decoration: none;
        font-size: 20px;
        padding: 10px;
        border-radius: 30px;
        
}
form input {
        padding: 10px;
    }
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    main img {
        margin-bottom: 20px;
        border: 5px solid black;
        border-radius: 100%;
        width: 150px;
        height: 150px;
    }

    form {
        flex-direction: column;
        align-items: center;
        display: flex;
        gap: 5px;
    }
    #button {
        background-color: black;
        color: white;
        border-radius: 30px;
        padding: 10px;
        font-size: 20px;
    }

    form input {
        padding: 5px;
    }
</style>