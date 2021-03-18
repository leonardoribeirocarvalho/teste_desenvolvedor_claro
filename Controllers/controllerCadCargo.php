<?php
session_start();
include("Controllers/controllerVerSession.php");
include("../Includes/variaveis.php");
include("../Class/ClassCrud.php");

$acao = $_POST['acao'];
$crud = new ClassCrud();

if($acao == "cadastro")
{
   $dados = $crud->insertDB(
        "cargo",
        "?,?,?"
        ,
        array(
            $id,
            $nome_cargo,
            $dt_cadastro
        )
    );
    if($dados->rowCount() > 0){
        $_SESSION['session_msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Cadastro efetuado com sucesso!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../listaCargo.php");
    }
    elseif($dados->rowCount() <= 0){
        $_SESSION['session_msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Erro ao cadastrar!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../listaCargo.php");
    }
}
elseif($acao == "edicao")
{
   $dados = $crud->updateDB(
        "cargo",
        "nome_cargo = ?",
        "id_cargo = ?",
        array(
            $nome_cargo,
            $id
        )
    );
    if($dados->rowCount() > 0){
        $_SESSION['session_msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Registro atualizado com sucesso!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../listaCargo.php");
    }
    elseif($dados->rowCount() <= 0){
        $_SESSION['session_msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Erro ao atualizar registro!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../listaCargo.php");
    }
}
?>