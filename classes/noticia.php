<?php


class noticia{

    private $conn;
    private $table_name = "tbnoticias";

    public function __construct($db)
    {
        $this->conn = $db;
    }
 //cadastrar uma nova noticia (o insert)
 public function registrar($titulo,$autor,$data,$noticia,$foto)
 {
     //vai armazena o pedido que vai executar no sql
     $query = "INSERT INTO " . $this->table_name . " (titulo,autor,data,noticia,foto) VALUES (?, ?, ?, ?, ?)";
 
     //esta preparando a query para ser executada
     $stmt = $this->conn->prepare($query);

     //esta preenchendo os campos que estao com ?, e executando a query e guarda
     $stmt->execute([$titulo,$autor,$data,$noticia,$foto]);

     //esta retornando o resultado encontrado 
     return $stmt;
 }
 
 public function ler()
 {
     //vai armazena o pedido que vai executar no sql
     $query = "SELECT * FROM " . $this->table_name ." ORDER BY data DESC";

     //esta preparando a query para ser executada
     $stmt = $this->conn->prepare($query);

     //esta executando a query e guardando 
     $stmt->execute();

    
     //esta retornando o resultado encontrado 
     return $stmt;
 }

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
 
 public function atualizar($id,$titulo,$autor,$data,$noticia,$foto)
 {
     //vai armazena o pedido que vai executar no sql
     $query = "UPDATE " . $this->table_name . " SET titulo = ?, autor = ?, data = ?, noticia = ?,foto = ? WHERE id = ?";

     //esta preparando a query para ser executada
     $stmt = $this->conn->prepare($query);

     //esta preenchendo os campos que estao com ?, e executando a query e guarda 
     $stmt->execute([$titulo,$autor,$data,$noticia,$foto,$id]);

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

?>