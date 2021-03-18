<html>
<?php
session_start();
include("Class/ClassCrud.php");
include("Controllers/controllerVerSession.php");
$crud = new ClassCrud();

$id_cargo = 0;
$nome_cargo = "";
$acao = "";
    
if(isset($_GET['id_cargo'])){
    $id_cargo = filter_input(INPUT_GET, 'id_cargo', FILTER_SANITIZE_SPECIAL_CHARS);
    $BFetch = $crud->selectDB(
        "*",
        "cargo",
        "WHERE id_cargo = ?",
        array($id_cargo)        
    );
    $dados = $BFetch->fetch(PDO::FETCH_ASSOC);
    
    $nome_cargo = $dados['nome_cargo'];
    $acao = "edicao";
}
else{
    $acao = "cadastro";
}
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include('Includes/headerComponents.php'); ?>
	<title>Cadastro de cargo</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php include('Includes/menu.php'); ?>
		<!-- Adiciona o menu a pagina -->
		<div class="content-wrapper">
            <a class="btn" href="listaCargo.php" data-tippy="Voltar"><i class="fas fa-arrow-circle-left fa-2x" style="color:#483D8B"></i></a><br><br>
			<div class="container-fluid">
				<div class="row">
                    <?php 
                    ?>
                    <div class="col-md-12">
                        <div class="card card-info" style="max-width: 500px;">
                            <div class="card-header">
                                Cadastro de cargo
                            </div><!-- end card header -->
                            <div class="card-body">
                                <form name="cadCargo" method="POST" action="Controllers/controllerCadCargo.php">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Nome do cargo</label>
                                            <input type="text" class="form-control" name="nome_cargo" value="<?= $nome_cargo?>" required>
                                        </div><!-- end col nome_cargo -->
                                    </div><!-- end div row cad_cargo -->
                            </div><!-- end card body -->
                            <div class="card-footer">
                                <input type="hidden" name="id" value="<?= $id_cargo ?>">
                                <input type="hidden" name="acao" value="<?= $acao ?>">
                                <input type="submit" class="btn btn-success" value="Cadastrar">
                            </div><!-- end footer cad_cargo -->
                                </form>
                        </div><!-- end card cargo -->
                    </div><!-- end col main -->
                </div><!-- end main row -->
            </div><!-- end container -->
		</div> <!-- end content -->
	</div> <!-- end wrapper -->
	<?php include_once('Includes/footerComponents.php'); ?>
</body>
</html>
