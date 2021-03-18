<html>
<?php
session_start();
include("Controllers/controllerVerSession.php");
include("Class/ClassCrud.php");
$crud = new ClassCrud();

$id_setor = "";
$nome_setor = "";
$id_gerente = 0;
$acao = "";
    
if(isset($_GET['id_setor'])){
    $id_setor = filter_input(INPUT_GET, 'id_setor', FILTER_SANITIZE_SPECIAL_CHARS);
    $BFetch = $crud->selectDB(
        "*",
        "setor",
        "WHERE id_setor = ?",
        array($id_setor)
    );
    $dados = $BFetch->fetch(PDO::FETCH_ASSOC);
    
    $id_setor = $dados['id_setor'];
    $nome_setor = $dados['nome_setor'];
    $id_gerente = $dados['id_gerente'];
    $acao = "editar";
}
else{
    $acao = "cadastro";
}
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
                                Cadastro de setor
                            </div><!-- end card header -->
                            <div class="card-body">
                                <form name="cadSetor" method="POST" action="Controllers/controllerCadSetor.php">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Nome do setor</label>
                                            <input type="text" class="form-control" name="nome_setor" value="<?= $nome_setor; ?>" required>
                                        </div><!-- end col nome_setor -->
                                        <div class="col-md-6">
                                            <label>Informe o gerente</label>
                                            <select class="form-control" name="id_gerente" required>
                                                <option></option>
                                                <?php $BFetch = $crud->selectDB(
                                                    "g.id_gerente, u.nome_usuario",
                                                    "gerente g",
                                                    "INNER JOIN usuario u ON g.id_usuario = u.id_usuario",
                                                    array()
                                                );
                                                    while($dados = $BFetch->fetch(PDO::FETCH_ASSOC)){?>
                                                        <option value="<?= $dados['id_gerente'];?>" <?php if($dados['id_gerente'] == $id_gerente){echo "selected";}?>><?= $dados['nome_usuario'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div><!-- end div row cad_setor -->
                            </div><!-- end card body -->
                            <div class="card-footer">
                                <input type="hidden" name="id" value="<?= $id_setor; ?>">
                                <input type="hidden" name="acao" value="<?= $acao; ?>">
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
