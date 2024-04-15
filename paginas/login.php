<?php
session_start();

if(isset($_POST["user"]) && isset($_POST["pass"])){
	
	//Dados do formulário
	$utilizador = $_POST["user"];
	$password = $_POST["pass"];
	include './basedados/basedados.h';
	include './ConstUtilizadores.php';
	//==================================================================//
	//Selecionar usuário correspondente da base de dados
	$sql = "SELECT * FROM utilizadores WHERE username = '$utilizador' AND password = '".md5($password)."' AND tipo_user != ".UTILIZADOR_APAGADO.";";
	$retval = mysqli_query($conn, $sql);
	if(!$retval){
		die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
	}
	$row = mysqli_fetch_array($retval);
	
	//==================================================================//
	if($row && mysqli_num_rows($retval) == 1){
		//=========================DADOS VÁLIDOS=========================//
		//Identifica o usuário 
		$_SESSION["user"] = $row["username"];
		$_SESSION["tipo"] = $row["tipo_user"];
	}else{
		$_SESSION["user"] = -1;
		$_SESSION["tipo"] = -1;
	}
	echo "<div id='loading'>Loading...</div><script> setTimeout(function () { window.location.href = 'secreta.php'; }, 1000)</script>";	
}else{
	session_destroy();
	header("refresh:0;url = ./index.php");
}
?>
