<?php
session_start();
include("Controllers/controllerVerSession.php");

$id = $_POST['id'] ?? $_GET['id'] ?? 0;    
$nome_cargo = $_POST['nome_cargo'] ?? $_GET['nome_cargo'] ?? "";
$dt_cadastro = $_POST['dt_cadastro'] ?? $_GET['dt_cadastro'] ?? 0;
$id_usuario = $_POST['id_usuario'] ?? $_GET['id_usuario'] ?? 0;
$id_cargo = $_POST['id_cargo'] ?? $_GET['id_cargo'] ?? 0;
$nome_usuario = $_POST['nome_usuario'] ?? $_GET['nome_usuario'] ?? "";
$nome_setor = $_POST['nome_setor'] ?? $_GET['nome_setor'] ?? "";
$id_acesso = $_POST['id_acesso'] ?? $_GET['id_acesso'] ?? 0;
$id_setor = $_POST['id_setor'] ?? $_GET['id_setor'] ?? 0;
$id_gerente = $_POST['id_gerente'] ?? $_GET['id_gerente'] ?? 0;
$senha = $_POST['senha'] ?? $_GET['senha'] ?? 0;
$login = $_POST['login'] ?? $_GET['login'] ?? 0;
$acao = $_POST['acao'] ?? $_GET['acao'] ?? 0;
?>