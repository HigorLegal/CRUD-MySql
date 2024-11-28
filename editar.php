<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}
include_once './config/config.php';
include_once './classes/Usuario.php';


$usuario = new Usuario($db);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $fone = $_POST['fone'];
    $email = $_POST['email'];
    $usuario->atualizar($id, $nome, $sexo, $fone, $email);
    header('Location: gerenciadorUsu.php');
    exit();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = $usuario->lerPorId($id);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="root.css">
</head>

<body>
    <header>
        <h1>Editar Usuário</h1>
    </header>
    <a href="gerenciadorUsu.php">sair</a>
    <main>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required>
            <br><br>
            <label>Sexo:</label>
            <label for="masculino_editar">
                <input type="radio" id="masculino_editar" name="sexo" value="M" <?php echo ($row['sexo'] === 'M') ? 'checked' : ''; ?> required> Masculino
            </label>
            <label for="feminino_editar">
                <input type="radio" id="feminino_editar" name="sexo" value="F" <?php echo ($row['sexo'] === 'F') ? 'checked' : ''; ?> required> Feminino
            </label>
            <br><br>
            <label for="fone">Fone:</label>
            <input type="text" name="fone" value="<?php echo $row['fone']; ?>" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
            <br><br>
            <input id="button" type="submit" value="Atualizar">
        </form>
    </main>
</body>

</html>
<style>
    @media screen and (min-width: 768px) {
        #button {
            background-color: black;
            color: white;
            border-radius: 30px;
            padding: 10px;
            font-size: 20px;
        }

        form {
            flex-direction: column;
            align-items: center;
            display: flex;

        }

        form input {
            padding: 5px;
        }

        a {
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

        a {
            background-color: black;
            color: white;
            text-decoration: none;
            font-size: 20px;
            padding: 10px;
            border-radius: 30px;

        }
    }

    @media screen and (max-width: 768px) {
        #button {
            background-color: black;
            color: white;
            border-radius: 30px;
            padding: 10px;
            font-size: 20px;
        }

        form {
            flex-direction: column;
            align-items: center;
            display: flex;

        }

        form input {
            padding: 5px;
        }

        a {
            background-color: black;
            color: white;
            text-decoration: none;
            font-size: 20px;
            padding: 10px;
            border-radius: 30px;

        }
label{
    
    font-size: 20px;
}
        form input {
            padding: 10px;
            border: 2px solid black;
            font-size: 20px;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        a {
            background-color: black;
            color: white;
            text-decoration: none;
            font-size: 30px;
            padding: 10px;
            border-radius: 30px;

        }

    }
</style>