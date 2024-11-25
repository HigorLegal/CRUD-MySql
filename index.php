<?php

include_once './config/config.php';
include_once './classes/noticia.php';
include_once './classes/usuario.php';
//claro




$noticia = new noticia($db);

$dados = $noticia->ler();


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
    <title>portal de noticias</title>
    <link rel="stylesheet" href="root.css">
</head>

<body>
<header>
<h1>Noticias</h1>

</header>

    <a href="login.php">logar</a>
    <br>

    <main>
        <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
            <?php
            $usuario = new Usuario($db);
            $infoUsu = $usuario->lerPorId($row['autor']);
            echo "<div id='noticia'>";


            echo "<div id='foto'><img src='".$row['foto']."' alt='imagem da noticia'></div>";

            echo "<div id='info'><h1>" . $row['titulo'] . "</h1>";
            echo "<p>" . $row['noticia'] . "</p><br><br>";
            echo "por: " . $infoUsu['nome'] . "<br><br>";
            echo $row['data'];





            echo "</div></div>"; ?>
        <?php endwhile; ?>

    </main>
</body>

</html>






<style>
    main div {
        background-color: white;

    }

    main {

        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

    #noticia h1 {
        color: red;
    }

    #noticia {
        border: 2px solid black;
        box-shadow: 0 0 10px black;
        width: 500px;
        margin-bottom: 20px;
        border-radius: 30px;
        padding: 20px;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
    }

    img {
        height: 90%;
        width: 90%;
    }
    a{
        background-color: black;
        color: white;
        text-decoration: none;
        font-size: 20px;
        padding: 10px;
        border-radius: 30px;
    }
    </style>