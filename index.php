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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>
    <header>
        <h1>Portal de Noticias</h1>
        <a href="login.php">logar</a>
    </header>

    <h1 style="text-align: center;">Bem vindo ao portal de noticias</h1>


    <div id="linha">

    </div>
    <main>
        <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
            <?php
            $usuario = new Usuario($db);
            $infoAutor = $usuario->lerPorId($row['autor']);
            echo "<div id='noticia'>";


            echo "<div id='foto'><img src='" . $row['foto'] . "' alt='imagem da noticia'></div>";

            echo "<div id='info'><h1>" . $row['titulo'] . "</h1>";
            echo "<p>" . $row['noticia'] . "</p><br><br>";
            echo "por: " . $infoAutor['nome'] . "<br><br>";
            echo $row['data'];




            echo "</div></div>"; ?>
        <?php endwhile; ?>

    </main>
</body>

</html>





<style>
    #linha {
        margin-top: 50px;
        margin-bottom: 50px;
        border: 2px solid black;

    }

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
        display: flex;
        justify-content: space-around;
        color: white;
        background-color: black;
        box-shadow: 0 0 200px black;
    }

    @media screen and (max-width: 768px) {


        main div {
            background-color: white;
        }

        main {

            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;

        }

        #noticia p {
            font-size: 15px;
        }   

        #noticia h1 {
            color: red;
            font-size: 20px;
        }

        #noticia {
            border: 2px solid black;
            box-shadow: 0 0 10px black;
            width: 300px;
            margin-bottom: 20px;
            border-radius: 30px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        img {
            height: 10%;
            width: 100%;
            border-radius: 20px;
        }

        a {
            background-color: white;
            color: black;
            text-decoration: none;
            font-size: 20px;
            padding: 10px;
            border-radius: 30px;
            margin-bottom: 20px;
        }

    }

    @media screen and (min-width: 768px) {


        main div {
            background-color: white;

        }

        main {

            display: flex;
            justify-content: center;
            flex-direction: row;
            gap: 50px;
            flex-wrap: wrap
        }

        #noticia h1 {
            color: red;
        }

        #noticia {
            border: 2px solid black;
            box-shadow: 0 0 10px black;
            width: 300px;
            margin-bottom: 20px;
            border-radius: 30px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }

        img {
            height: 100%;
            width: 100%;
        }

        a {
            background-color: white;
            color: black;
            text-decoration: none;
            font-size: 20px;
            padding: 10px;
            border-radius: 30px;
        }
    }
</style>