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
	<title>Lista de setor</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php include_once('Includes/menu.php'); ?>
		<!-- Adiciona o menu a pagina -->
		<div class="content-wrapper">
            <a class="btn" href="dashboardCrud.php" data-tippy="Voltar"><i class="fas fa-arrow-circle-left fa-2x" style="color:#483D8B"></i></a>
            <a class="btn" href="cadSetor.php" data-tippy="Cadastrar setor"><i class="fas fa-plus-circle fa-2x" style="color:green"></i></a><br><br>
			<div class="container-fluid">
                <?php include("Includes/alert.php");?>
				<div class="row"><br>
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                Lista de setor
                            </div><!-- end cardheader -->
                            <div class="card-body">
                                <table id="table1" class="table table-bordered table-hover">
                                    <thead>
                                        <th>ID</th>
                                        <th>Setor</th>
                                        <th>Ações</th>
                                    </thead>
                                    <tbody>
                                        <?php $BFetch = $crud->selectDB(
                                            "s.id_setor, s.nome_setor, COUNT(s.id_setor), us.nome_usuario",
                                            "setor s",
                                            "INNER JOIN gerente g ON s.id_gerente = g.id_gerente INNER JOIN usuario us ON g.id_usuario = us.id_usuario GROUP BY s.id_setor",
                                            array()
                                        );
                                            while($dados = $BFetch->fetch(PDO::FETCH_ASSOC)){?>
                                                <tr>
                                                    <td><?php echo $dados['id_setor']; ?></td>
                                                    <td><?php echo $dados['nome_setor']; ?></td>
                                                    <td><a type="button" class="btn" href="detalharSetor.php?id_setor=<?=$dados['id_setor'];?>" data-tippy="Visualizar setor"><span class="fas fa-eye" style="color:green;"></span></a>
                                                    <a class="btn editaSetor" href="cadSetor.php?id_setor=<?=$dados['id_setor'];?>" data-tippy="Editar setor"><span class="fas fa-edit" style="color:blue;"></span></a>
                                                    <a type="button" class="btn deletar" href="Controllers/controllerDelSetor.php?id_setor=<?= $dados['id_setor'];?>" data-tippy="Excluir setor"><span class="fas fa-trash" style="color:red;"></span></a></td>
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
