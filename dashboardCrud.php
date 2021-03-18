<html>
<?php
session_start();
error_reporting(~E_NOTICE);
include("Controllers/controllerVerSession.php");
include("Class/ClassCrud.php");
$crud = new ClassCrud();
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include_once('Includes/headerComponents.php'); ?>
	<title>Crud Dashboard</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed" id="limpaTempo">
	<div class="wrapper">
		<?php include("Includes/menu.php"); ?>
		<!-- Adiciona o menu a pagina -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h3>Bem vindx, <?= $_SESSION['nome_usuario'];?>!</h3><br>
			</section>
			<div class="container-fluid">
				<div class="row">
					<!-- Start row -->
					<div class="col-lg-4 col-6">
						<div class="small-box bg-info">
							<div class="inner">
								<h3>
                                <?php $BFetch = $crud->selectDB(
                                        "COUNT(id_acesso) as qtd_adm",
                                        "usuario",
                                        "WHERE id_acesso = 1",
                                        array()
                                    );$dados = $BFetch->fetch(PDO::FETCH_ASSOC);
                                    echo $dados['qtd_adm'];?>
                                </h3>
								<p>Qtd. usuário administrador</p>
							</div>
							<div class="icon">
								<i class="fas fa-user-ninja" aria-hidden="true"></i>
							</div>
							<a href="#" class="acesso small-box-footer" data-a="1">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-lg-4 col-6">
						<div class="small-box bg-info">
							<div class="inner">
								<h3>
                                <?php $BFetch = $crud->selectDB(
                                        "COUNT(id_acesso) as qtd_avan",
                                        "usuario",
                                        "WHERE id_acesso = 3",
                                        array()
                                    );$dados = $BFetch->fetch(PDO::FETCH_ASSOC);
                                    echo $dados['qtd_avan'];?>
                                </h3>
								<p>Qtd. usuário avançado</p>
							</div>
							<div class="icon">
								<i class="fas fa-user-tie" aria-hidden="true"></i>
							</div>
							<a href="#" class="acesso small-box-footer" data-a="3">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-lg-4 col-6">
						<div class="small-box bg-info">
							<div class="inner">
								<h3>
                                <?php $BFetch = $crud->selectDB(
                                        "COUNT(id_acesso) as qtd_basc",
                                        "usuario",
                                        "WHERE id_acesso = 2",
                                        array()
                                    );$dados = $BFetch->fetch(PDO::FETCH_ASSOC);
                                    echo $dados['qtd_basc'];?>
                                </h3>
								<p>Qtd. usuário básico</p>
							</div>
							<div class="icon">
								<i class="fa fa-user" aria-hidden="true"></i>
							</div>
							<a href="#" class="acesso small-box-footer" data-a="2">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div><!-- End row -->
			</div> 
			<script>
				$('.acesso').click(function() {
					var id_acesso = $(this).attr("data-a");
					$.ajax({
						url: "listaUsuario.php?id_acesso=" + id_acesso,
						cache: false,
						success: function(result) {
							window.document.location = 'listaUsuario.php?id_acesso=' + id_acesso;
						}
					});
				});
			</script>
			<div class="row">
				<div class="col-md-12">
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Qtd. usuário por setor</h3>
							<div class="card-tools">
								<button class="btn"><i class=""></i></button>
								<button data-tippy="Minimizar/maximizar detalhes" type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							</div><!-- end card tools -->
						</div><!-- end card header -->
						<div class="card-body">
                            <table id="table1" class="table table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Setor</th>
                                    <th>Qtd. usuários</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    <?php $BFetch = $crud->selectDB(
                                        "s.nome_setor, u.id_setor, COUNT(u.id_setor) as qtd_colab",
                                        "usuario u",
                                        "LEFT JOIN setor s ON u.id_setor = s.id_setor GROUP BY u.id_setor",
                                        array()
                                    );
                                        while($dados = $BFetch->fetch(PDO::FETCH_ASSOC)){?>
                                            <tr>
                                                <td><?= $dados['id_setor']; ?></td>
                                                <td><?= $dados['nome_setor']; ?></td>
                                                <td><?= $dados['qtd_colab']; ?></td>
                                                <td><a type="button" class="btn" href="detalharSetor.php?id_setor=<?=$dados['id_setor'];?>" data-tippy="Visualizar setor"><span class="fas fa-eye" style="color:green;"></span></a>
                                                </td>
                                            </tr>
                                    <?php } ?>
                                </tbody>
                            </table><!-- end userlist table -->
						</div><!-- end card body -->
					</div><!-- end card setores -->
				</div><!-- end col setores -->
			</div><!-- end row setores -->
            <div class="row">
				<div class="col-md-12">
					<div class="card card-secondary">
						<div class="card-header">
							<h3 class="card-title">Atalhos</h3>
							<div class="card-tools">
								<button class="btn"><i class=""></i></button>
								<button data-tippy="Minimizar/maximizar detalhes" type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							</div><!-- end card tools -->
						</div><!-- end card header -->
						<div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="listaUsuario.php" style="height:100px;width:150px" class="btn btn-app"><i class="fas fa-plus" style="margin-top:15px;color:green;"></i><b>Cargo</b></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="listaUsuario.php" style="height:100px;width:150px" class="btn btn-app"><i class="fas fa-plus" style="margin-top:15px;color:green;"></i><b>Gerente</b></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="listaUsuario.php" style="height:100px;width:150px" class="btn btn-app"><i class="fas fa-plus" style="margin-top:15px;color:green;"></i><b>Setor</b></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="listaUsuario.php" style="height:100px;width:150px" class="btn btn-app"><i class="fas fa-plus" style="margin-top:15px;color:green;"></i><b>Usuário</b></a>
                                </div>
                            </div>
						</div><!-- end card body -->
					</div><!-- end card atalhos -->
				</div><!-- end col atalhos -->
			</div><!-- end row atalhos -->
		</div> <!-- End content -->
	</div> <!-- End wrapper -->
	<?php include("Includes/footerComponents.php"); ?>
</body>
</html>
