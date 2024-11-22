<?php
//esse comando e um cokie mais seguro (isso oque o professor falou)
session_start();

include_once './config/config.php';
include_once './classes/usuario.php';

//instanciando o obj da class usuario
$usuario = new Usuario($db);

//formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['login'])) {
        // Processar login
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if ($dados_usuario = $usuario->login($email, $senha)) {
            //a variavel global session ela cria um acesso (basicamente se nao tiver esse aceso ele nao pode entrar em portal.php 
            //ex:nao da para ir de cadastro para portal porque nao tem essa credencial)
            $_SESSION['usuario_id'] = $dados_usuario['id'];
          
            //vai pra portal.php
            header('Location:portal.php');

            exit();
        } else {

            $mensagem_erro = "Credenciais inválidas!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>A U T E N T I C A Ç Ã O</title>
<link rel="stylesheet" href="root.css">
</head>


<body>
    <header>
        <h1>AUTENTICAÇÃO</h1>
    </header>


    <main>

        <div class="box">

            <img src="https://static.vecteezy.com/ti/vetor-gratis/t1/7033146-perfil-icone-login-head-icon-vetor.jpg" alt="">

            <form method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" required>

                <label for="senha">Senha</label>
                <input type="password" name="senha" required>

                <input id="button" type="submit" name="login" value="Login">
            </form>
            <p style="margin-top: 10px;">Não tem uma conta? <a href="./registrar.php">Registre-se aqui</a></p>
            <div class="mensagem">
                <?php if (isset($mensagem_erro)) echo '<p>' . $mensagem_erro . '</p>'; ?>
            </div>

    </main>

</body>


</html>
<style>
    input {
        padding: 10px;
    }

 
    

    #button {
        color: white;
        background-color: black;
        border-radius: 30px;
        padding: 10px;
        margin-top: 10px;
    }

    table {
        background-color: black;
        color: white;
        padding: 10px;
    }

    form {

        display: flex;
        align-items: center;
        flex-direction: column;
    }

    main img {

        margin-bottom: 20px;
        border-radius: 100%;
        height: 200px;
        width: 200px;
    }

    .box {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

 
</style>