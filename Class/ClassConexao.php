<?php
abstract class ClassConexao
{
    protected function connectaDB()
    {
        try{
            $conn = new PDO("mysql:host=localhost;dbname=claro", "root", "");
            return $conn;
        }catch (PDOException $Erro) {
            return $Erro->getMessage();
        }
    }
}
?>
