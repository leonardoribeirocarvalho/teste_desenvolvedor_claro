<html>
<?php
session_start();
include("Controllers/controllerVerSession.php");
include("Class/ClassCrud.php");

$id_usuario = $_GET['id_usuario'];
$crud = new ClassCrud();

$BFetch = $crud->selectDB(
    "u.id_usuario, u.nome_usuario, c.nome_cargo, s.nome_setor, p.nome_permissao",
    "usuario u",
    "INNER JOIN cargo c ON u.id_cargo = c.id_cargo INNER JOIN nivel_acesso p ON u.id_acesso = p.id_acesso LEFT JOIN setor s ON u.id_setor = s.id_setor WHERE u.id_usuario = ?",
    array($id_usuario)
);
$dados = $BFetch->fetch(PDO::FETCH_ASSOC);

#setando variaveis com retorno do bd
$nome_usuario = $dados['nome_usuario'];
$nome_cargo = $dados['nome_cargo'];
$nome_setor = $dados['nome_setor'];
$nome_permissao = $dados['nome_permissao'];
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include_once('Includes/headerComponents.php'); ?>
	<title>Titulo da aba</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php include_once('Includes/menu.php'); ?>
		<!-- Adiciona o menu a pagina -->
		<div class="content-wrapper">
            <a class="btn" href="listaUsuario.php" data-tippy="Voltar"><i class="fas fa-arrow-circle-left fa-2x" style="color:#483D8B"></i></a><br><br>
			<div class="container-fluid">
				<div class="row">
                    <?php 
                    ?>
                    <div class="col-md-12">
                        <div class="card card-info" style="max-width: 800px;">
                            <div class="card-header">
                                Detalhe do usuário
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="nome_usuario" value="<?php echo $nome_usuario;?>" readonly>
                                    </div><!-- end col nome_cargo -->
                                    <div class="col-md-6">
                                        <label>Informe o cargo</label>
                                        <select class="form-control" name="nome_cargo" readonly>
                                            <option><?php echo $nome_cargo?></option>
                                        </select>
                                    </div><!-- end col nome_cargo -->
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Informe o setor</label>
                                        <select type="text" class="form-control" name="nome_setor" readonly>
                                            <option><?php if($nome_setor == ""){echo "Não alocado";}else{echo $nome_setor;}?></option>
                                        </select>
                                    </div><!-- end col nome_cargo -->
                                    <div class="col-md-6">
                                        <label>Defina a permissão</label>
                                        <select class="form-control" name="nome_permissao" readonly>
                                            <option><?php echo $nome_permissao;?></option>
                                        </select>
                                    </div><!-- end col nome_cargo -->
                                </div><!-- end div row cad_setor -->
                            </div><!-- end card body -->
                        </div><!-- end card setor -->
                    </div><!-- end col main -->
                </div><!-- end main row -->
            </div><!-- end container -->
		</div> <!-- end content -->
	</div> <!-- end wrapper -->
	<?php include_once('Includes/footerComponents.php'); ?>
</body>
</html>