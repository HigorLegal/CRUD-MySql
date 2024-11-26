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
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $noticia = $_POST['noticia'];
    $autor = $_POST['autor'];

    if(isset($_POST['foto'])){
        $foto =  $row['foto'];
        
    }else{
        $foto = "./uploads/".$_POST['foto'];
    }
    
  
    $noticias->atualizar($id,$titulo,$autor,$data,$noticia,$foto);
    header('Location: gerenciadorNot.php');
    exit();
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
    <h1>Editar Noticia</h1>
    </header>
    <a href="gerenciadorNot.php">voltar</a>
    <main>
    <form method="POST">
        <div></div>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="titulo">titulo:</label>
        <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required>
        <br><br>
        <label>autor:</label>
         <select  name="autor"  require>
                <option value="<?php  $row['autor']?>"><?php $criador = $usuario->lerPorId($row['autor']); echo "autor atual : ".$criador["nome"]?></option>
                <?php foreach ($usuarios as $usuario):?> 
                    
                    <option value="<?php echo $usuario['id']; ?>">

                        <?php echo htmlspecialchars($usuario["nome"]); ?>
                    
                    </option>
                <?php endforeach; ?>
            </select>
        <br><br>
        <label>informaçoes da noticia:</label>
        <input type="text" name="noticia" value="<?php echo $row['noticia']; ?>" required>
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
        @media screen and (min-width: 768px) {

img{
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
    a{
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
     a{
    background-color: black;
        color: white;
        text-decoration: none;
        font-size: 20px;
        padding: 10px;
        border-radius: 30px;
        
}
}
@media screen and (max-width: 768px) {
            img{
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
            label{
                font-size:20px ;
            }
                form input {
                    font-size: 20px;
                    padding: 5px;
                    border: 2px solid black;
                }
                a{
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
                 a{
                background-color: black;
                    color: white;
                    text-decoration: none;
                    font-size: 20px;
                    padding: 10px;
                    border-radius: 30px;
                    
            }

select{ 
    font-size: 20px;
    border: 2px solid black;
}

        }
</style>