<?php 
include('ClassConexao.php');

class ClassCrud extends ClassConexao{
    #atributos
    private $crud;
    private $contador;
    
    private function preparedStatements($query, $parametros)
    {
        $this->countParametros($parametros);
        $this->crud=$this->connectaDB()->prepare($query);
        
        #se tiver parametro execute um bindValue
        if($this->contador > 0){
            for($i = 1; $i <= $this->contador; $i++)
            {
                $this->crud->bindValue($i, $parametros[$i - 1]);
            }
        }
        $this->crud->execute();
    }
    #contador de parametros
    private function countParametros($parametros)
    {
        $this->contador = count($parametros);
    }
    #insercao no db
    public function insertDB($tabela, $condicao, $parametros){
        $this->preparedStatements("INSERT INTO {$tabela} VALUES ({$condicao})", $parametros);
        return $this->crud;
    }
    #selecao no db
    public function selectDB($campos, $tabela, $condicao, $parametros){
        $this->preparedStatements("SELECT {$campos} FROM {$tabela} {$condicao}", $parametros);
        return $this->crud;
    }
    #atualizacao no db
    public function updateDB($tabela, $set, $condicao, $parametros)
    {
        $this->preparedStatements("UPDATE {$tabela} SET {$set} WHERE {$condicao}", $parametros);
        return $this->crud;
    }
    #Deletar dados no db
    public function deleteDB($tabela, $condicao, $parametros)
    {
        $this->preparedStatements("DELETE FROM {$tabela} WHERE {$condicao}" ,$parametros);
        return $this->crud;
    }
}