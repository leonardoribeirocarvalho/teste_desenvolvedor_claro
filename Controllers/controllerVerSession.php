<?php
error_reporting(~E_NOTICE);
session_start();

if (!empty($_SESSION['id_usuario'])) {
		
} else {
	$_SESSION['session_msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Acesso negado! Faça login pra acessar o sistema.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    header("Location: login.php");
}
?>
