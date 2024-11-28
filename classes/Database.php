<?php
class Database
{
    private $host = "LocalHost";
    private $db_name = "dbcrud";
    private $username = "root";
    private $password = "";
    public $conn;



    public function getConnection()
    {

        $this->conn = null;

        try {
            //para instanciar deve informar essas informaçoes
            $this->conn = new PDO(
                "mysql:host=" . $this->host .
                    ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
        } catch (PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
