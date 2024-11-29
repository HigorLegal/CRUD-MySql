<?php
session_start();

include_once './config/config.php';
include_once './classes/Usuario.php';
include_once './classes/noticia.php';
$msg = "";
/*
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}*/

try {
    $usuario = new Usuario($db);
    $usuarios = $usuario->ler();
} catch (Exception $e) {
    die("erro : " . $e->getmessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $diretorio = "./uploads";

    if (!is_dir($diretorio)) {
        // A pasta não existe, então cria ela
        mkdir($diretorio, 0777, true);
    }

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $noticia = $_POST['noticia'];
    $dataPublicacao = $_POST['data'];
    $imagem = $_FILES['imagem'];

    // Validações do upload da imagem
    $nomeImagem = "";
    if ($imagem['error'] === UPLOAD_ERR_OK) {
        $extensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
        $tamanhoMaximo = 10 * 1024 * 1024; // 10 MB

        // Validar tipo de arquivo
        $tiposPermitidos = ['jpg', 'jpeg', 'png'];
        if (!in_array($extensao, $tiposPermitidos)) {
            die("Apenas arquivos JPG ou PNG são permitidos.");
        }

        // Validar tamanho do arquivo
        if ($imagem['size'] > $tamanhoMaximo) {
            die("O tamanho do arquivo não pode exceder 10 MB.");
        }

        // Gerar nome único para o arquivo
        $nomeImagem = uniqid() . "." . $extensao;
        $destino = "./uploads/" . $nomeImagem;

        // Mover o arquivo para o diretório
        if (!move_uploaded_file($imagem['tmp_name'], $destino)) {
            die("Erro ao salvar a imagem.");
        }
    } else if ($imagem['error'] !== UPLOAD_ERR_NO_FILE) {
        die("Erro ao fazer upload da imagem.");
    }

    // Conversão da data para o formato americano
    $noticiaObj = new noticia($db);

    // Salvar a notícia no banco de dados
    $noticiaObj->registrar($titulo, $autor, $dataPublicacao, $noticia, $destino);

    $msg = "noticia publicada com sucesso";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Adicionar noticia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="root.css">
</head>

<body>
    <main>
        <header>
            <h1>Publicar Noticia</h1>
        </header>
        <a href="gerenciadorNot.php">gerenciadorNot de noticias</a>
        <form method="POST" enctype="multipart/form-data">
            <label for="titulo">titulo:</label>
            <input type="text" name="titulo" required>

            <select name="autor" require>
                <option value="">escolha o autor</option>
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?php echo $usuario['id']; ?>">
                        <?php echo htmlspecialchars($usuario["nome"]); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="data">data:</label>
            <input type="date" name="data" required>

            <label for="noticia">informaçoes da noticia:</label>
            <textarea id="noticia" name="noticia" rows="8" cols="30"></textarea>

            <label for="imagem">imagem da noticia:</label>
            <input type="file" name="imagem" id="imagem" accept="jpg,png" required>

            <input id="button" type="submit" value="Adicionar">
            <?php echo "<h1>" . $msg . "</h1>" ?>
        </form>
    </main>
</body>

</html>
<style>
    @media screen and (min-width: 768px) {
        select {
            margin-top: 5px;
            padding: 5px;
            font-size: 20px;
        }

        form label {
            font-size: 20px;
        }

        form input {
            padding: 10px;
        }

        #button {
            background-color: black;
            color: white;
            border-radius: 30px;
            padding: 10px;
            font-size: 20px;
        }

        form {
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 5px;
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
        select {
            border: 2px solid black;
            margin-top: 5px;
            padding: 5px;
            font-size: 20px;
        }

        form label {
            font-size: 20px;
        }

        textarea {

            border: 2px solid black;
        }

        form input {
            padding: 10px;
            border: 2px solid black;
        }

        #button {
            background-color: black;
            color: white;
            border-radius: 30px;
            padding: 10px;
            font-size: 20px;
            margin-top: 20px;
        }

        form {
            margin-top: 50px;
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 5px;

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
</style>