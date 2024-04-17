<html>
<head>
  <meta charset="utf-8">
  <title>FormaEst - Cursos para Formação</title>
</head>
<style>
	body{
		background-image:url(./imgs/fundoLogin.jpg);
		background-position: top center;
	}
	#loading{
		background-color:#A9F5A9;
		width:380px;
		height:50px;
		margin: 200px auto 0px;
		overflow:hidden;
		box-shadow:0px 0px 5px #6F6666;
		text-align:center;
		font: bold 20px/50px sans-serif;
		color: white;
	}
</style>
<body>
</body>
</html>  
  
<?php

session_start();

if(isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["email"]) && isset($_POST["imagem"]) && isset($_POST["morada"]) && isset($_POST["telemovel"]) && !empty($_POST["user"]) && !empty($_POST["pass"]) && !empty($_POST["email"]) && !empty($_POST["imagem"]) && !empty($_POST["morada"]) && !empty($_POST["telemovel"])){
	
	//Dados do formulário
	$utilizador = $_POST["user"];
	$password = $_POST["pass"];
    $email = $_POST["email"];
	$imagem = $_POST["imagem"];
    $morada = $_POST["morada"];
	$telemovel = $_POST["telemovel"];
	include '../basedados/basedados.h';
	include './ConstUtilizadores.php';
	//==================================================================//
	//Selecionar user correspondente da base de dados
	$sql = "INSERT INTO utilizadores (username, email, imagem, endereco, password, telefone, tipo_user) 
					VALUES ('".$utilizador."', '".$email."','".$imagem."','".$morada."','".md5($password)."','".$telemovel."', '4');";
	$res = mysqli_query ($conn, $sql);
	if(! $res ){
		die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
	}
	echo "<div id='loading'>Loading...</div><script> setTimeout(function () { window.location.href = 'secreta.php'; }, 1000)</script>";	
}else{
	session_destroy();
	header("refresh:0;url = ./index.php");
}
?>