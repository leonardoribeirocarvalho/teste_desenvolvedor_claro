<html>
<?php
session_start();
include("Controllers/controllerVerSession.php");
include("Class/ClassCrud.php");

#inicializando variaveis
    $id_acesso = "";
    $id_usuario = 0;
    $nome_usuario = "";
    $id_cargo = "";
    $nome_cargo = "";
    $id_setor = "";
    $nome_setor = "";
    $id_acesso = "";
    $nome_permissao = "";
    $acao = "";
    
$crud = new ClassCrud();
if(isset($_GET['id_usuario'])){
    $id_usuario = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_SPECIAL_CHARS);
    $BFetch = $crud->selectDB(
            "u.id_usuario, u.nome_usuario, u.id_cargo, c.nome_cargo, u.id_setor, s.nome_setor, u.id_acesso, p.nome_permissao",
            "usuario u",
            "INNER JOIN cargo c ON u.id_cargo = c.id_cargo INNER JOIN nivel_acesso p ON u.id_acesso = p.id_acesso LEFT JOIN setor s ON u.id_setor = s.id_setor WHERE u.id_usuario = ?",
            array($id_usuario)
    );
    $dados = $BFetch->fetch(PDO::FETCH_ASSOC);

    #setando variaveis com retorno do bd
    $nome_usuario = $dados['nome_usuario'];
    $id_cargo = $dados['id_cargo'];
    $nome_cargo = $dados['nome_cargo'];
    $id_setor = $dados['id_setor'];
    $nome_setor = $dados['nome_setor'];
    $id_acesso = $dados['id_acesso'];
    $nome_permissao = $dados['nome_permissao'];
    $acao = "editar";
    $id_acesso = $_SESSION['id_acesso'];
}
else
{
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
            <a class="btn" href="listaUsuario.php" data-tippy="Voltar"><i class="fas fa-arrow-circle-left fa-2x" style="color:#483D8B"></i></a><br><br>
			<div class="container-fluid">
                <?php include("Includes/alert.php");?>
				<div class="row">
                    <div class="col-md-12">
                    <?php if($id_acesso != 2){?>
                        <div class="card card-info" style="max-width: 800px;">
                            <div class="card-header">
                                Cadastro de usuário
                            </div><!-- end card header -->
                            <div class="card-body">
                                <form name="cadCargo" method="POST" action="Controllers/controllerCadUsuario.php">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Nome</label>
                                            <input type="text" class="form-control" name="nome_usuario" value="<?php if($id_usuario > 0){ echo $dados['nome_usuario'];}?>" required>
                                        </div><!-- end col nome_cargo -->
                                        <div class="col-md-6">
                                            <label>Informe o cargo</label>
                                            <select class="form-control" name="id_cargo" required>
                                            <option></option>
                                            <?php $BFetch = $crud->selectDB(
                                                "*", #campos
                                                "cargo", #tabela
                                                "", #condicao
                                                array() #parametros
                                            );
                                                while($dados = $BFetch->fetch(PDO::FETCH_ASSOC)){?>
                                                    <option value="<?php echo $dados['id_cargo'];?>" <?php if($dados['id_cargo'] == $id_cargo){echo "selected";}?>><?= $dados['nome_cargo']; ?></option>
                                                <?php }?>
                                            </select>
                                        </div><!-- end col nome_cargo -->
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Informe o setor</label>
                                            <select type="text" class="form-control" name="id_setor">
                                                <option></option>
                                                <?php $BFetch = $crud->selectDB(
                                                    "*", 
                                                    "setor",
                                                    "",
                                                    array()
                                                );    
                                                    while($dados = $BFetch->fetch(PDO::FETCH_ASSOC)){?>
                                                <option value="<?= $dados['id_setor'];?>" <?php if($dados['id_setor'] == $id_setor){echo "selected";}?>><?= $dados['nome_setor']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div><!-- end col nome_cargo -->
                                        <div class="col-md-6">
                                            <label>Defina a permissão</label>
                                            <select class="form-control" name="id_acesso" required>
                                                <option></option>
                                                <?php $BFetch = $crud->selectDB(
                                                    "*",
                                                    "nivel_acesso",
                                                    "",
                                                    array()
                                                );
                                                    while($dados = $BFetch->fetch(PDO::FETCH_ASSOC)){?>
                                                    <option value="<?= $dados['id_acesso'];?>" <?php if($dados['id_acesso'] == $id_acesso){echo "selected";}?>><?= $dados['nome_permissao'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div><!-- end col nome_cargo -->
                                    </div><!-- end div row cad_setor -->
                            </div><!-- end card body -->
                            <div class="card-footer">
                                <input type="hidden" name="id" value="<?= $id_usuario; ?>">
                                <input type="hidden" name="acao" value="<?= $acao; ?>">
                                <input type="submit" class="btn btn-success" value="Cadastrar">
                            </div><!-- end footer cad_setor -->
                                </form>
                        </div><!-- end card setor -->
                        <?php } else{ ?><h3><?= "Acesso negado! Você não pode realizar essa ação.";}?></h3>
                    </div><!-- end col main -->
                </div><!-- end main row -->
            </div><!-- end container -->
		</div> <!-- end content -->
	</div> <!-- end wrapper -->
	<?php include_once('Includes/footerComponents.php'); ?>
</body>
</html>