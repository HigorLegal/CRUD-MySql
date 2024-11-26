<?php
session_start();
include_once './config/config.php';
include_once './classes/noticia.php';
include_once './classes/usuario.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}

$noticia = new noticia($db);
$autor = new Usuario($db);
$dados = $noticia->ler();

// Obter dados do usuário logado


// Obter dados dos usuários
if (isset($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $noticia->deletar($id);
    header('Location: gerenciador.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador</title>
    <link rel="stylesheet" href="root.css">
</head>
<body>
    <header>
<h1>gerenciador de noticias</h1>
    </header>
<div id="links">
    <a href="logout.php">sair</a>
    <a href="gerenciadorUsu.php">gerenciador de usuarios</a>
    <a href="cadastrarNot.php">criar noticia</a>
    </div><main>
    <table border="1">
        <tr>
            
            <th>titulo</th>
            <th>data</th>
            <th>autor</th>
           
            <th>foto</th>
            <th>ações</th>
        </tr>
        <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo ($row['data']);?></td>
                <td><?php  $criador = $autor->lerPorId($row['autor']); echo $criador["nome"] ?></td>
               
                <td id="foto"><img src="<?php echo $row['foto']; ?>" alt=""></td>
                <td>
                    <a href="deletarNot.php?id=<?php echo $row['id']; ?>"><img id="imgalt"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcx1AupvWZqkA2_GijfJIDCsc1xCNXVNOkDQ&s" alt=""></a>
                    <a href="editarNot.php?id=<?php echo $row['id']; ?>"><img id="imgex" src="https://cdn.pixabay.com/photo/2017/06/06/00/33/edit-icon-2375785_640.png" alt=""></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    </main>
</body>
</html>

<style>
    @media screen and (min-width: 768px) {
                
        main{
            display: flex;
            
            justify-content: center
        }
        table{
            text-align: center;
          
            margin-top: 50px;
            background-color: black;
            color: white;
    border-color: #ffffff38;
}
#links {
   
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
}
#links a{
    text-align: center;
    width: 100px;
    background-color: black;
    color: white;
    text-decoration: none;
    font-size: 20px;
    padding: 10px;
    border-radius: 30px;
    
}
#foto img{
width: 110px;
height: 90px;
    }
a img{
    margin-left: 10px;
    border: 3px solid white;
    border-radius: 100%;
    width: 30px;
    height  : 30px;
    
    
}
}
@media screen and (max-width: 768px) {
    main{
        display: flex;
        
        justify-content: center
    }
    table{
     
    text-align: center;
        font-size: 13px;
        margin-top: 50px;
            background-color: black;
            color: white;
    border-color: #ffffff38;
    }
    #links {
    
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
    }
    #links a{
    text-align: center;
    width: 100px;
    background-color: black;
    color: white;
    text-decoration: none;
    font-size: 20px;
    padding: 10px;
    border-radius: 30px;
    
    }
    #foto img{
width: 50px;
height: 40px;
    }
    a img{
    margin-left: 10px;
    border: 3px solid white;
    border-radius: 100%;
    width: 30px;
    height  : 30px;
    
    
    }

}

</style>