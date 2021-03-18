<html>
<?php session_start();?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-css.css">
    <?php include("Includes/headerComponents.php");?>
	<title>Login CRUD</title>
</head>
<body style="background-image: url('imagens/bg-intranex.png')">
	<div class="wrapper fadeInDown">
		<div id="formContent" style="background-color: #6c6c6c;">
			<?php include("Includes/alert.php"); ?>
			<!-- Login Form -->
			<form method="POST" action="Controllers/controllerValidaUsuario.php">
				<br>
				<input type="text" id="login" class="fadeIn first" name="login" placeholder="Usuário" required>
				<input type="password" id="senha" class="fadeIn second" name="senha" placeholder="Senha" required><br><br>
				<input type="submit" id="btnLogin" class="fadeIn third" name="btnLogin" value="Acessar">
			</form>
		</div>
	</div>
	<?php include_once("Includes/footerComponents.php");?>
</body>
</html>
