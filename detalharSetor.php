<html>
<?php
session_start();
include("Controllers/controllerVerSession.php");   
include("Class/ClassCrud.php");
    
$id_setor = $_GET['id_setor'];
$crud = new ClassCrud();
    
$BFetch = $crud->selectDB(
    "s.id_setor, s.nome_setor, COUNT(s.id_setor) as qtd_colab, us.nome_usuario as gerente",
    "setor s",
    "LEFT JOIN usuario u ON s.id_setor = u.id_setor INNER JOIN gerente g ON s.id_gerente = g.id_gerente INNER JOIN usuario us ON g.id_usuario = us.id_usuario WHERE s.id_setor = ?",
    array($id_setor)
);
    
$dados = $BFetch->fetch(PDO::FETCH_ASSOC);
$nome_setor = $dados['nome_setor'];
$gerente = $dados['gerente'];
$qtd_colab = $dados['qtd_colab'];
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
            <a class="btn" href="listaSetor.php" data-tippy="Voltar"><i class="fas fa-arrow-circle-left fa-2x" style="color:#483D8B"></i></a><br><br>
			<div class="container-fluid">
				<div class="row">
                    <?php 
                    ?>
                    <div class="col-md-12">
                        <div class="card card-info" style="max-width: 700px;">
                            <div class="card-header">
                                Detalhes do setor
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nome do setor</label>
                                        <input type="text" class="form-control" name="nome_setor" value="<?= $nome_setor; ?>"readonly>
                                    </div><!-- end col nome_setor -->
                                    <div class="col-md-6">
                                        <label>Gerente</label>
                                        <select class="form-control" name="nome_gerente" readonly>
                                            <option><?= $gerente; ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Colaboradores</label>
                                        <input type="text" class="form-control" name="qtd_colaboradores" value="<?= $qtd_colab; ?>" readonly>
                                    </div>
                                </div><!-- end div row cad_setor -->
                            </div><!-- end card body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-success" value="Cadastrar">
                            </div><!-- end footer cad_setor -->
                        </div><!-- end card setor -->
                    </div><!-- end col main -->
                </div><!-- end main row -->
            </div><!-- end container -->
		</div> <!-- end content -->
	</div> <!-- end wrapper -->
	<?php include_once('Includes/footerComponents.php'); ?>
</body>
</html>
