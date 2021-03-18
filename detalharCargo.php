<html>
<?php
session_start();
include("Controllers/controllerVerSession.php");
include("Class/ClassCrud.php");
    
$id_cargo = filter_input(INPUT_GET, 'id_cargo', FILTER_SANITIZE_SPECIAL_CHARS);
$crud = new ClassCrud();
    
$BFetch = $crud->selectDB(
    "c.id_cargo, c.nome_cargo, COUNT(u.id_cargo) as qtd_colab",
    "cargo c",
    "LEFT JOIN usuario u ON c.id_cargo = u.id_cargo WHERE c.id_cargo = ?",
    array($id_cargo)
);
$dados = $BFetch->fetch(PDO::FETCH_ASSOC);
$nome_cargo = $dados['nome_cargo'];
$qtd_colab = $dados['qtd_colab'];
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include('Includes/headerComponents.php'); ?>
	<title>Titulo da aba</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php include('Includes/menu.php'); ?>
		<!-- Adiciona o menu a pagina -->
		<div class="content-wrapper">
			<a class="btn" href="listaCargo.php" data-tippy="Voltar"><i class="fas fa-arrow-circle-left fa-2x" style="color:#483D8B"></i></a><br><br>
			<div class="container-fluid">
				<div class="row">
                    <div class="col-md-12">
                        <div class="card card-info" style="max-width: 600px;">
                            <div class="card-header">
                            Detalhes do cargo
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label>Nome do cargo</label>
                                        <input type="text" class="form-control" name="nome_cargo" value="<?= $nome_cargo; ?>" readonly>
                                    </div><!-- end col nome_cargo -->
                                    <div class="col-md-4">
                                        <label>Qtd colaboradores</label>
                                        <input type="text" class="form-control" name="qtd_colab" value="<?= $qtd_colab; ?>" readonly>
                                    </div><!-- end col nome_cargo -->
                                </div><!-- end div row cad_cargo -->
                            </div><!-- end card body -->
                        </div><!-- end card cargo -->
                    </div><!-- end col main -->
                </div><!-- end main row -->
            </div><!-- end container -->
		</div> <!-- end content -->
	</div> <!-- end wrapper -->
	<?php include_once('Includes/footerComponents.php'); ?>
</body>
</html>
