<?php
class Usuario
{

    //basicamente vai receber a connecçao
    private $conn;
    private $table_name = "usuarios";

    //o construtor (nao esquece que tem que fazer esse metodo global)
    public function __construct($db)
    {
        $this->conn = $db;
    }


    //cadastrar um novo usuario (o insert)
    public function registrar($nome, $sexo, $fone, $email, $senha)
    {
        //vai armazena o pedido que vai executar no sql
        $query = "INSERT INTO " . $this->table_name . " (nome, sexo, fone, email, senha) VALUES (?, ?, ?, ?, ?)";

        //esta preparando a query para ser executada
        $stmt = $this->conn->prepare($query);

        //esta criptografando a senha e colocando nessa variavel
        $hashed_password = password_hash($senha, PASSWORD_BCRYPT);

        //esta preenchendo os campos que estao com ?, e executando a query e guarda
        $stmt->execute([$nome, $sexo, $fone, $email, $hashed_password]);

        //esta retornando o resultado encontrado 
        return $stmt;
    }




    //logar um usu
    public function login($email, $senha)
    {
        //vai armazena o pedido que vai executar no sql
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ?";

        //esta preparando a query para ser executada
        $stmt = $this->conn->prepare($query);
        //esta preenchendo os campos que estao com ?, e executando a query e guarda 
        $stmt->execute([$email]);

        //vai guardar todos os usuarios do banco de dados no $usuario
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        //esta verificando se ele acha algun usuario no banco de dados(esse paswrd_verify tem que ser usado por conta da criptografia da senha)
        if ($usuario && password_verify($senha, $usuario['senha'])) {

            //se achar ele retorna o usuario desejado
            return $usuario;
        }
        //se nao achar ele retorna false
        return false;
    }




    //criar um usuario 
    public function criar($nome, $sexo, $fone, $email, $senha)
    {
        //vai basicamente pegar a funçao registrar e usar ela os requisitos para registrar um novo usuario 
        return $this->registrar($nome, $sexo, $fone, $email, $senha);
    }
    //mostrar os usuarios
    public function ler()
    {
        //vai armazena o pedido que vai executar no sql
        $query = "SELECT * FROM " . $this->table_name;

        //esta preparando a query para ser executada
        $stmt = $this->conn->prepare($query);

        //esta executando a query e guardando 
        $stmt->execute();

        //esta retornando o resultado encontrado 
        return  $stmt;
    }




    //mostrar um usuario especifico
    public function lerPorId($id)
    {

        //vai armazena o pedido que vai executar no sql
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";

        //esta preparando a query para ser executada
        $stmt = $this->conn->prepare($query);

        //esta preenchendo os campos que estao com ?, e executando a query e guarda 
        $stmt->execute([$id]);

        //esta retornando o resultado encontrado 
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }




    public function atualizar($id, $nome, $sexo, $fone, $email)
    {
        //vai armazena o pedido que vai executar no sql
        $query = "UPDATE " . $this->table_name . " SET nome = ?, sexo = ?, fone = ?, email = ? WHERE id = ?";

        //esta preparando a query para ser executada
        $stmt = $this->conn->prepare($query);

        //esta preenchendo os campos que estao com ?, e executando a query e guarda 
        $stmt->execute([$nome, $sexo, $fone, $email, $id]);

        //esta retornando o resultado encontrado 
        return $stmt;
    }




    public function deletar($id)
    {
        //vai armazena o pedido que vai executar no sql
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        //esta preparando a query para ser executada
        $stmt = $this->conn->prepare($query);

        //esta preenchendo os campos que estao com ?, e executando a query e guarda 
        $stmt->execute([$id]);

        //esta retornando o resultado encontrado 
        return $stmt;
    }
}
