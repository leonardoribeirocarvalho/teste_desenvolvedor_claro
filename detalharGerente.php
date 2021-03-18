<html>
<?php
session_start();
include("Controllers/controllerVerSession.php");
include("Class/ClassCrud.php");
    
$id_gerente = $_GET['id_gerente'];
$crud = new ClassCrud();
    
$BFetch = $crud->selectDB(
    "g.id_gerente, u.nome_usuario, s.nome_setor",
    "gerente g",
    "INNER JOIN usuario u ON g.id_usuario = u.id_usuario LEFT JOIN setor s ON g.id_gerente = s.id_gerente WHERE g.id_gerente = ?",
    array($id_gerente)
    );
$dados = $BFetch->fetch(PDO::FETCH_ASSOC);
$nome_gerente = $dados['nome_usuario'];
$nome_setor = $dados['nome_setor'];
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
            <a class="btn" href="listaGerencia.php" data-tippy="Voltar"><i class="fas fa-arrow-circle-left fa-2x" style="color:#483D8B"></i></a><br><br>
			<div class="container-fluid">
				<div class="row">
                    <div class="col-md-12">
                        <div class="card card-info" style="max-width: 700px;">
                            <div class="card-header">
                                Detalhes do gerente
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nome do gerente</label>
                                        <input type="text" class="form-control" name="nome_setor" value="<?= $nome_gerente; ?>"readonly>
                                    </div><!-- end col nome_setor -->
                                    <div class="col-md-6">
                                        <label>Responsável por</label>
                                        <select class="form-control" name="nome_gerente" readonly>
                                            <option><?php if($nome_setor == ""){ echo "Não alocado";}else{echo $nome_setor;}?></option>
                                        </select>
                                    </div>
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
