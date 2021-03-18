<?php
session_start();
include("../Class/ClassCrud.php");

$crud = new ClassCrud();

$btnLogin = filter_input(INPUT_POST, 'btnLogin');
if ($btnLogin) {
	echo $login = filter_input(INPUT_POST, 'login');
	$senha = filter_input(INPUT_POST, 'senha');
	    
        $BFetch = $crud->selectDB(
          "l.id_usuario, l.login, l.senha, u.id_acesso, u.nome_usuario",
          "login l",
          "INNER JOIN usuario u ON l.id_usuario = u.id_usuario WHERE l.login = ?",
          array($login)
        );
        $dados = $BFetch->fetch(PDO::FETCH_ASSOC);
        echo $login = $dados['login'];
		if (isset($dados)) {
			if (password_verify($senha, $dados['senha']) == true) {
				#inicializando sessao do id_permissao para verificacao
				$_SESSION['id_acesso'] = $dados['id_acesso'];
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                $_SESSION['nome_usuario'] = $dados['nome_usuario'];
                
				if ($_SESSION['id_acesso'] > 0){
					header("Location: ../dashboardCrud.php");
				}
			} else {
				$_SESSION['session_msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Login ou senha inválido(s)!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                header("Location: ../login.php");
			}
		}
	} else {
			$_SESSION['session_msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="fas fa-exclamation-circle"></span><strong> Login ou senha inválido(s)!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            header("Location: ../login.php");
    }