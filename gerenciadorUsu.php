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
    header('Location: gerenciadorUsu.php');
    exit();
}

// Obter dados do usuário logado
$dados_usuario = $usuario->lerPorId($_SESSION['usuario_id']);

if ($dados_usuario['nome'] != NULL) {
    $nome_usuario = $dados_usuario['nome'];
} else {

    header('Location: index.php');
    exit();
}


// Obter dados dos usuários
$dados = $usuario->ler();
// Função para determinar a saudação
function saudacao()
{
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
    <title>gerenciadorUsu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>
    <header>
        <h1>gerenciamento de usuarios</h1>
        <div id="links">
            <a href="logout.php">Logout</a>
            <a href="gerenciadorNot.php">gerenciar noticias</a>
            <a href="registrar.php">Adicionar Usuário</a>

        </div>
    </header>
    <h1 id="msg"> <?php echo saudacao() . ", <b>" . $nome_usuario . "</b>"; ?>!</h1>
    <br>
    <main>

        <table border="1">
            <tr>

                <th>Nome</th>
                <th>Sexo</th>
                <th>Fone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>

                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo ($row['sexo'] === 'M') ? 'Masculino' : 'Feminino'; ?></td>
                    <td><?php echo $row['fone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="deletar.php?id=<?php echo $row['id']; ?>"><img id="imgalt" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcx1AupvWZqkA2_GijfJIDCsc1xCNXVNOkDQ&s" alt=""></a>
                        <a href="editar.php?id=<?php echo $row['id']; ?>"><img id="imgex" src="https://cdn.pixabay.com/photo/2017/06/06/00/33/edit-icon-2375785_640.png" alt=""></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </main>
    
</body>

</html>

<style>
    * {
        margin: 0;
    }

    body {
        background-color: white;
    }

    @media screen and (min-width: 768px) {
        header {
            align-items: center;
            margin-bottom: 50px;
            display: flex;
            justify-content: space-around;
            padding: 20px;
            color: white;
            background-color: black;
            box-shadow: 0 0 200px black;
        }

        #msg {
            margin-bottom: 20px;
        }

        b {
            color: blue;

        }

        main {
            display: flex;

            justify-content: center
        }

        table td{
            padding: 10px;
        }
        table {
            text-align: center;
            margin-top: 50px;
            
            font-size: 20px;
            background-color: black;
            color: white;
            border-color: #ffffff38;
        }

        #links {
            gap: 20px;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }

        #links a {
            text-align: center;
            width: 100px;
            background-color: white;
            color: black;
            text-decoration: none;
            font-size: 20px;
            padding: 10px;
            border-radius: 30px;

        }

        table img {
            margin-left: 10px;
            border: 3px solid white;
            border-radius: 100%;
            width: 50px;
            height: 50px;


        }
    }

    @media screen and (max-width: 768px) {
        header {
            margin-bottom: 50px;
            text-align: center;
            padding: 20px;
            color: white;
            background-color: black;
            box-shadow: 0 0 200px black;
        }

        #msg {
            margin-bottom: 20px;
        }

        b {
            color: blue;

        }

        main {
            display: flex;

            justify-content: center
        }

        table {
            text-align: center;
            margin-top: 50px;
            background-color: black;
            color: white;
            border-color: black;
            width: 100px;
            font-size: 15px;
        }

        #links {

            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }

        #links a {
            text-align: center;
            width: 100px;
            background-color: white;
            color: black;
            text-decoration: none;
            font-size: 20px;
            padding: 10px;
            border-radius: 30px;

        }

        table img {
            margin-left: 10px;
            border: 3px solid white;
            border-radius: 100%;
            width: 30px;
            height: 30px;


        }

    }
</style>