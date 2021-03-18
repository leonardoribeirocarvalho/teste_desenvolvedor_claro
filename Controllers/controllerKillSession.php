<?php
session_start();

unset($_SESSION['id_usuario'], $_SESSION['id_permissao']);
$_SESSION['session_msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Desconectado com sucesso!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
header("Location: ../login.php");
?>