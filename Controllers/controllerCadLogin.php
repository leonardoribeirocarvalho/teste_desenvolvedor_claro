<?php
session_start();
include("Controllers/controllerVerSession.php");
include("../Includes/variaveis.php");
include("../Class/ClassCrud.php");

$senha_cript = PASSWORD_HASH($senha, PASSWORD_DEFAULT);

$dados = $crud->insertDB(
    "login",
    "?,?,?,?"
    ,
    array(
        $id,
        $login,
        $senhas_cript,
        $id_usuario
    )
);
if($dados->rowCount() > 0){
    $_SESSION['session_msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Cadastro efetuado com sucesso!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    header("Location: ../listaUsuario.php");
}
elseif($dados->rowCount() <= 0){
    $_SESSION['session_msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Erro ao cadastrar!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    header("Location: ../listaUsuario.php");
}
?>