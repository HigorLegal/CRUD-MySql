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
$usuario = new Usuario($db);


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = $noticias->lerPorId($id);
    $usuarios = $usuario->ler();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $diretorio = "./uploads";

    if (!is_dir($diretorio)) {
        // A pasta não existe, então cria ela
        mkdir($diretorio, 0777, true);
    }

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $noticia = $_POST['noticia'];
    $autor = $_POST['autor'];
    
    $nomeImagem = "";
    if (!isset($_FILES['foto'])) {
        
        $foto =  $row['foto'];
    
    } else {
        $foto = $_FILES['foto'];

        if ($foto['error'] === UPLOAD_ERR_OK) {
            $extensao = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
            $tamanhoMaximo = 10 * 1024 * 1024; // 10 MB
    
            // Validar tipo de arquivo
            $tiposPermitidos = ['jpg', 'jpeg', 'png'];
            if (!in_array($extensao, $tiposPermitidos)) {
                die("Apenas arquivos JPG ou PNG são permitidos.");
            }
    
            // Validar tamanho do arquivo
            if ($foto['size'] > $tamanhoMaximo) {
                die("O tamanho do arquivo não pode exceder 10 MB.");
            }
    
            // Gerar nome único para o arquivo
            $nomeImagem = uniqid() . "." . $extensao;
            $destino = "./uploads/" . $nomeImagem;
    
            // Mover o arquivo para o diretório
            if (!move_uploaded_file($foto['tmp_name'], $destino)) {
                die("Erro ao salvar a imagem.");
            }
        } else if ($foto['error'] !== UPLOAD_ERR_NO_FILE) {
            die("Erro ao fazer upload da imagem.");
        }
    }
  



    $noticias->atualizar($id, $titulo, $autor, $data, $noticia, $destino);
    header('Location: gerenciadorNot.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Noticia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
</head>

<body>
    <header>
        <h1>Editar Noticia</h1>
    </header>
    <a href="gerenciadorNot.php">voltar</a>
    <main>
        <form method="POST" enctype="multipart/form-data">
            <div></div>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="titulo">titulo:</label>
            <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required>
            <br><br>
            <label style="margin-bottom: 10px;">autor:</label>
            <label><?php $criador = $usuario->lerPorId($row['autor']);
                    echo "autor atual : " . $criador["nome"] ?></label>
            <select name="autor" require>

                <?php foreach ($usuarios as $usuario): ?>

                    <option value="<?php echo $usuario['id']; ?>">

                        <?php echo htmlspecialchars($usuario["nome"]); ?>

                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>
            <label>informaçoes da noticia:</label>
            <textarea name="noticia" id="noticia" rows="8" cols="30"><?php echo $row['noticia'] ?></textarea>
            <br><br>
            <label for="data">data:</label>
            <input type="date" name="data" value="<?php echo $row['data']; ?>" required>
            <br><br>
            <label for="fotoAtual">foto atual:</label>
            <img src="<?php echo $row['foto'] ?>" alt="imagem atual">

            <label style="margin-top: 20px;" for="fotoNova">foto nova:</label>
            <input type="file" name="foto" value="">
            <br><br>
            <input id="button" type="submit" value="Atualizar">
        </form>
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

header {
    margin-bottom: 50px;
    text-align: center;
    padding: 20px;
    color: white;
    background-color: black;
    box-shadow: 0 0 200px black;
}

    select {
        padding: 10px;
    }

    @media screen and (min-width: 768px) {

        img {
            width: 200px;
            height: 150px;
            text-align: center;
            color: red;
            background-color: lightgrey;
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

        #button {
            background-color: black;
            color: white;
            border-radius: 30px;
            padding: 10px;
            font-size: 20px;
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
        img {
            width: 200px;
            height: 150px;
            text-align: center;
            color: red;
            background-color: lightgrey;
        }

        form {
            flex-direction: column;
            align-items: center;
            display: flex;

        }

        label {
            font-size: 20px;
        }

        textarea {
            font-size: 20px;
            padding: 5px;
            border: 2px solid black;
        }

        form input {
            font-size: 20px;
            padding: 5px;
            border: 2px solid black;
        }

        a {
            background-color: black;
            color: white;
            text-decoration: none;
            font-size: 20px;
            padding: 10px;
            border-radius: 30px;

        }

        #button {
            background-color: black;
            color: white;
            border-radius: 30px;
            padding: 10px;
            font-size: 20px;
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

        select {
            font-size: 20px;
            border: 2px solid black;
        }

    }
</style>