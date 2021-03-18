<html>
<?php
session_start();
include("Controllers/controllerVerSession.php");
include("Class/ClassCrud.php");
$crud = new ClassCrud();

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
                        <div class="card card-info" style="max-width: 700px;">
                            <div class="card-header">
                                Cadastro de setor
                            </div><!-- end card header -->
                            <div class="card-body">
                                <form name="cadSetor" method="POST" action="Controllers/controllerCadLogin.php">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Login</label>
                                            <input type="text" class="form-control" name="login" required>
                                        </div><!-- end col login -->
                                        <div class="col-md-4">
                                            <label>Senha</label>
                                            <input type="password" class="form-control" name="senha" required>
                                        </div><!-- end col senha -->
                                        <div class="col-md-4">
                                            <label>Selecione o usuário</label>
                                            <select class="form-control" name="id_usuario" required>
                                                <option></option>
                                                <?php $BFetch = $crud->selectDB(
                                                    "u.id_usuario, u.nome_usuario",
                                                    "usuario u",
                                                    "INNER JOIN setor s ON u.id_setor = s.id_setor WHERE u.id_setor IS NOT NULL",
                                                    array()
                                                );
                                                    while($dados = $BFetch->fetch(PDO::FETCH_ASSOC)){?>
                                                        <option value="<?= $dados['id_usuario'];?>"?><?= $dados['nome_usuario'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div><!-- end col usuario -->
                                    </div><!-- end div row cad_setor -->
                            </div><!-- end card body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-success" value="Cadastrar">
                            </div><!-- end footer cad_setor -->
                                </form>
                        </div><!-- end card setor -->
                    </div><!-- end col main -->
                </div><!-- end main row -->
            </div><!-- end container -->
		</div> <!-- end content -->
	</div> <!-- end wrapper -->
	<?php include_once('Includes/footerComponents.php'); ?>
</body>
</html>
