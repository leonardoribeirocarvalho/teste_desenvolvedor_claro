<html>
<?php
session_start();
include("Controllers/controllerVerSession.php");
include("Class/ClassCrud.php");
$crud = new ClassCrud();
    
$id_acesso = "";
$control = "";
if(isset($_GET['id_acesso']))
{
    $id_acesso = filter_input(INPUT_GET, 'id_acesso', FILTER_SANITIZE_SPECIAL_CHARS);
    $control = " WHERE u.id_acesso = ?";
}
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include_once('Includes/headerComponents.php'); ?>
	<title>Lista de usuários</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php include_once('Includes/menu.php'); ?>
		<!-- Adiciona o menu a pagina -->
		<div class="content-wrapper">
            <a class="btn" href="dashboardCrud.php" data-tippy="Voltar"><i class="fas fa-arrow-circle-left fa-2x" style="color:#483D8B"></i></a>
            <a class="btn" href="cadUsuario.php" data-tippy="Cadastrar usuário"><i class="fas fa-plus-circle fa-2x" style="color:green"></i></a><br><br>
			<div class="container-fluid">
                <?php include("Includes/alert.php"); ?>
				<div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                Lista de usuários
                            </div><!-- end cardheader -->
                            <div class="card-body">
                                <table id="table1" class="table table-bordered table-hover">
                                    <thead>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Ações</th>
                                    </thead>
                                    <tbody>
                                        <?php $BFetch = $crud->selectDB(
                                            "u.id_usuario, u.nome_usuario, c.nome_cargo, s.nome_setor, p.nome_permissao",
                                            "usuario u",
                                            "INNER JOIN cargo c ON u.id_cargo = c.id_cargo INNER JOIN nivel_acesso p ON u.id_acesso = p.id_acesso LEFT JOIN setor s ON u.id_setor = s.id_setor".$control,
                                            array($id_acesso)
                                        );
                                            while($dados = $BFetch->fetch(PDO::FETCH_ASSOC)){?>
                                                <tr>
                                                    <td><?= $dados['id_usuario']; ?></td>
                                                    <td><?= $dados['nome_usuario']; ?></td>
                                                    <td><a type="button" class="btn" href="detalharUsuario.php?id_usuario=<?=$dados['id_usuario'];?>" data-tippy="Visualizar usuário"><span class="fas fa-eye" style="color:green;"></span></a>
                                                    <a class="btn editaUsuario" href="cadUsuario.php?id_usuario=<?=$dados['id_usuario'];?>" data-tippy="Editar usuário"><span class="fas fa-edit" style="color:blue;"></span></a>
                                                    <a type="button" class="btn deletar" href="Controllers/controllerDelUsuario.php?id_usuario=<?= $dados['id_usuario'];?>" data-tippy="Excluir usuário"><span class="fas fa-trash" style="color:red;"></span></a></td>
                                                </tr>
                                        <?php } ?>
                                    </tbody>
                                </table><!-- end userlist table -->
                            </div><!-- end cardbody -->
                        </div><!-- end card userlist -->
                    <!-- end col -->
                </div><!-- end main row -->
            </div><!-- end container -->
		</div> <!-- end content -->
	</div> <!-- end wrapper -->
	<?php include_once('Includes/footerComponents.php'); ?>
    
</body>
</html>
