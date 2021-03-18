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
		<?php include_once('Includes/menu.php');?><!-- Adiciona o menu a pagina -->
		<div class="content-wrapper">
            <a class="btn" href="dashboardCrud.php" data-tippy="Voltar"><i class="fas fa-arrow-circle-left fa-2x" style="color:#483D8B"></i></a>
            <a href="cadCargo.php" class="btn" data-tippy="Cadastrar novo cargo"><i class="fas fa-plus-circle fa-2x" style="color:green;"></i></a><br><br>
			<div class="container-fluid">
                <?php include("Includes/alert.php");?>
				<div class="row"><br>
                    <div class="col-md-12">
                        <div class="card card-info" style="margin-left:7px;">
                            <div class="card-header">
                                Lista de cargos
                            </div><!-- end cardheader -->
                            <div class="card-body">
                                <table id="table1" class="table table-bordered table-hover">
                                    <thead>
                                        <th>ID</th>
                                        <th>Cargo</th>
                                        <th>Qtd colaboradores</th>
                                        <th>Ações</th>
                                    </thead>
                                    <tbody>
                                        <?php $BFetch = $crud->selectDB(
                                            "c.id_cargo, c.nome_cargo, COUNT(u.id_cargo) as qtd_colab",
                                            "cargo c",
                                            "LEFT JOIN usuario u ON c.id_cargo = u.id_cargo GROUP BY c.id_cargo",
                                            array()
                                        );
                                            while($dados = $BFetch->fetch(PDO::FETCH_ASSOC)){?>
                                                <tr>
                                                    <td><?php echo $dados['id_cargo']; ?></td>
                                                    <td><?php echo $dados['nome_cargo']; ?></td>
                                                    <td><?php echo $dados['qtd_colab']; ?></td>
                                                    <td><a type="button" class="btn" href="detalharCargo.php?id_cargo=<?=$dados['id_cargo'];?>" data-tippy="Visualizar cargo"><span class="fas fa-eye" style="color:green;"></span></a>
                                                    <a class="btn editaCargo" href="cadCargo.php?id_cargo=<?=$dados['id_cargo'];?>" data-tippy="Editar cargo"><span class="fas fa-edit" style="color:blue;"></span></a>
                                                    <a type="button" class="btn deletar" href="Controllers/controllerDelCargo.php?id_cargo=<?= $dados['id_cargo'];?>" data-tippy="Excluir cargo"><span class="fas fa-trash" style="color:red;"></span></a></td>
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
