<html>
<?php
session_start();
include("Class/ClassCrud.php");
include("Controllers/controllerVerSession.php");
$crud = new ClassCrud();

$id_acesso = $_SESSION['id_acesso'];
$id_usuario = 0;
$id_gerente = 0;
$acao = "";
    
if(isset($_GET['id_gerente'])){
    $id_gerente = filter_input(INPUT_GET, 'id_gerente', FILTER_SANITIZE_SPECIAL_CHARS);
    $BFetch = $crud->selectDB(
        "*",
        "gerente",
        "WHERE id_gerente = ?",
        array($id_gerente)        
    );
    $dados = $BFetch->fetch(PDO::FETCH_ASSOC);
    
    $id_usuario = $dados['id_usuario'];
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
                <?php if($id_acesso == 1){?>
				<div class="row">
                    <div class="col-md-12">
                        <div class="card card-info" style="max-width: 500px;">
                            <div class="card-header">
                                Cadastro de gerente
                            </div><!-- end card header -->
                            <div class="card-body">
                                <form name="cadCargo" method="POST" action="Controllers/controllerCadGerente.php">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><?php if($id_gerente > 0){ echo "Altere o usuário da gerência ";?><i class="fas fa-info-circle" data-tippy="Esse usuário herdará todas as atribuições do gerente anterior." style="color:blue;"></i><?php }else{ echo "Atribuir gerência a um usuário"; } ?></label>
                                            <select class="form-control" name="id_usuario" required>
                                                <option></option>
                                                <?php $BFetch = $crud->selectDB(
                                                    "u.id_usuario, u.nome_usuario",
                                                    "usuario u",
                                                    "INNER JOIN setor s ON u.id_setor = s.id_setor WHERE u.id_setor IS NOT NULL",
                                                    array()
                                                );
                                                    while($dados = $BFetch->fetch(PDO::FETCH_ASSOC)){?>
                                                        <option value="<?= $dados['id_usuario'];?>"<?php if($dados['id_usuario'] == $id_usuario){ echo "selected";}?>><?= $dados['nome_usuario'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div><!-- end col def_ger -->
                                    </div><!-- end div row def_ger  -->
                            </div><!-- end card body -->
                            <div class="card-footer">
                                <input type="hidden" name="id" value="<?= $id_gerente; ?>">
                                <input type="hidden" name="acao" value="<?= $acao; ?>">
                                <input type="submit" class="btn btn-success" value="Cadastrar">
                            </div><!-- end footer def_ger -->
                                </form>
                        </div><!-- end card def_ger -->
                        <?php } else{ ?><h3><?= "Acesso negado! Você não pode realizar essa ação.";}?></h3>
                    </div><!-- end col main -->
                </div><!-- end main row -->
            </div><!-- end container -->
		</div> <!-- end content -->
	</div> <!-- end wrapper -->
	<?php include_once('Includes/footerComponents.php'); ?>
</body>
</html>