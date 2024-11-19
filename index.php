<?php
//esse comando e um cokie mais seguro (isso oque o professor falou)
session_start();

include_once './config/config.php';
include_once './classes/Usuario.php';

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
            header('Location: portal.php');

            exit();
        } else {

            $mensagem_erro = "Credenciais inválidas!";
        }
    }
}
?>
<!DOCTYPE html>
<html>


<head>
    <title>A U T E N T I C A Ç Ã O</title>

</head>


<body>


    <div class="container">


        <div class="box">
            <h1>A U T E N T I C A Ç Ã O</h1>


            <form method="POST">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <br><br>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" required>
                <br><br>
                <input type="submit" name="login" value="Login">
            </form>
            <p>Não tem uma conta? <a href="./registrar.php">Registre-se aqui</a></p>
            <div class="mensagem">
                <?php if (isset($mensagem_erro)) echo '<p>' . $mensagem_erro . '</p>'; ?>
            </div>
        </div>


</body>


</html>