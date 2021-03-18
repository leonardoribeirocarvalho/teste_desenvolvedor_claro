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
        "setor",
        "?,?,?,?",
        array(
            $id,
            $nome_setor,
            $id_gerente,
            $dt_cadastro
        )
    );
    if($dados->rowCount() > 0){
        $_SESSION['session_msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Cadastro efetuado com sucesso!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../listaSetor.php");
    }
    elseif($dados->rowCount() <= 0){
        $_SESSION['session_msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Erro ao cadastrar!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../listaSetor.php");
    }
}
elseif($acao = "editar")
{
    $dados = $crud->updateDB(
        "setor",
        "nome_setor = ?, id_gerente = ?",
        "id_setor = ?",
        array(
            $nome_setor,
            $id_gerente,
            $id
        )
    );
    if($dados->rowCount() > 0){
        $_SESSION['session_msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Registro atualizado com sucesso!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../listaSetor.php");
    }
    elseif($dados->rowCount() <= 0){
        $_SESSION['session_msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Erro ao atualizar registro!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../listaSetor.php");
    }
}
?>