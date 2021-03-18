<?php
session_start();
include("../Class/ClassCrud.php");
include("Controllers/controllerVerSession.php");

$crud = new ClassCrud();
$id_gerente = filter_input(INPUT_GET, 'id_gerente', FILTER_SANITIZE_SPECIAL_CHARS);

$dados = $crud->deleteDB(
    "gerente",
    "id_gerente=?",
    array($id_gerente)
);
    if($dados->rowCount() > 0){
        $_SESSION['session_msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Registro deletado com sucesso!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../listaGerencia.php");
    }
    elseif($dados->rowCount() <= 0){
        $_SESSION['session_msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Erro ao deletar registro!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../listaGerencia.php");
    }
?>