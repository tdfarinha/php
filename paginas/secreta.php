<html>
<head>
<style>
	body{
		background-image:url(./imgs/cabecalho.png);
		background-position: top center;
	}
</style>
<body>
</body>
</head>
</html>  

<?php
session_start();

if(!isset($_SESSION["user"]) || !isset($_SESSION["tipo"])){
	
	$_SESSION["bt"] = "Página Login";
	$_SESSION["erro"] = "Algo não correu bem!!! Dirija-se para a Página de Login ou Registe-se";
	$_SESSION["dir"] = "./PgLogin.php";
	echo "<script>  setTimeout(function () { window.location.href = './Msg_erro.php'; }, 0000)</script>";	
	
}else{
	include "./ConstUtilizadores.php";
	if($_SESSION["tipo"] == ALUNO_NAO_VALIDADO){
		
		$_SESSION["bt"] = "Voltar";
		$_SESSION["erro"] = "Conta Ainda Não validada!<br>Por favor, Tente mais tarde!";
		$_SESSION["dir"] = "./PgLogin.php";
		echo "<script>  setTimeout(function () { window.location.href = './Msg_erro.php'; }, 0000)</script>";	
		
	}else if($_SESSION["user"]==-1 || $_SESSION["tipo"] == -1){
		
		$_SESSION["bt"] = "Voltar";
		$_SESSION["erro"] = "Combinação inválida!<br>Por favor, Preencha todos os campos corretamente.";
		$_SESSION["dir"] = "./PgLogin.php";
		echo "<script>  setTimeout(function () { window.location.href = './Msg_erro.php'; }, 0000)</script>";	
		
	}else{
		echo " <script> alert ('Fez Login') </script>";
		echo "<script>  setTimeout(function () { window.location.href = './PgUtilizador.php'; }, 0000)</script>";	
	}
}
	
?>