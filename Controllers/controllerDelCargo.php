<?php 
session_start();
include("../Class/ClassCrud.php");
include("Controllers/controllerVerSession.php");

$crud = new ClassCrud();
$id_cargo = filter_input(INPUT_GET, 'id_cargo', FILTER_SANITIZE_SPECIAL_CHARS);

$dados = $crud->deleteDB(
    "cargo",
    "id_cargo=?",
    array($id_cargo)
);
    if($dados->rowCount() > 0){
        $_SESSION['session_msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Registro deletado com sucesso!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../listaCargo.php");
    }
    elseif($dados->rowCount() <= 0){
        $_SESSION['session_msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Erro ao deletar registro!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../listaCargo.php");
    }
?>