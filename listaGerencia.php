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
	<title>Lista de gerentes</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php include_once('Includes/menu.php'); ?>
		<!-- Adiciona o menu a pagina -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
            <a class="btn" href="dashboardCrud.php" data-tippy="Voltar"><i class="fas fa-arrow-circle-left fa-2x" style="color:#483D8B"></i></a>
            <a class="btn" href="cadGerente.php" data-tippy="Cadastrar gerente"><i class="fas fa-plus-circle fa-2x" style="color:green"></i></a><br><br>
			<div class="container-fluid">
                <?php include("Includes/alert.php");?>
				<div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                Lista de gerentes
                            </div><!-- end cardheader -->
                            <div class="card-body">
                                <table id="table1" class="table table-bordered table-hover">
                                    <thead>
                                        <th>ID</th>
                                        <th>Nome gerente</th>
                                        <th>Ações</th>
                                    </thead>
                                    <tbody>
                                        <?php $BFetch = $crud->selectDB(
                                            "g.id_gerente, u.nome_usuario, s.nome_setor",
                                            "gerente g",
                                            "INNER JOIN usuario u ON g.id_usuario = u.id_usuario LEFT JOIN setor s ON g.id_gerente = s.id_gerente",
                                            array()
                                        );
                                            while($dados = $BFetch->fetch(PDO::FETCH_ASSOC)){?>
                                                <tr>
                                                    <td><?php echo $dados['id_gerente']; ?></td>
                                                    <td><?php echo $dados['nome_usuario']; ?></td>
                                                    <td><a type="button" class="btn" href="detalharGerente.php?id_gerente=<?=$dados['id_gerente'];?>" data-tippy="Visualizar gerencia"><span class="fas fa-eye" style="color:green;"></span></a>
                                                    <a class="btn editaGerente" href="cadGerente.php?id_gerente=<?=$dados['id_gerente'];?>" data-tippy="Editar gerencia"><span class="fas fa-edit" style="color:blue;"></span></a>
                                                    <a type="button" class="btn deletar" href="Controllers/controllerDelGerente.php?id_gerente=<?= $dados['id_gerente'];?>" data-tippy="Excluir gerente"><span class="fas fa-trash" style="color:red;"></span></a></td>
                                                </tr>
                                        <?php } ?>
                                    </tbody>
                                </table><!-- end userlist table -->
                            </div><!-- end cardbody -->
                        </div><!-- end card userlist -->
                    </div><!-- end col -->
                </div><!-- end main row -->
            </div><!-- end container -->
		</div> <!-- end content -->
	</div> <!-- end wrapper -->
	<?php include_once('Includes/footerComponents.php'); ?>
</body>
</html>
