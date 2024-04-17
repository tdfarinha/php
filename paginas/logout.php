<html>
<head>
<title>FormaEst - Cursos para Formação</title>
<style>
	body{
		background-color: #f0f5f5; /* Azul claro */
		background-image: url(./imgs/cabecalho.png);
	}
</style>
<body>
</body>
</head>
</html>  

<?php
	session_start();
	session_destroy();
	header("refresh:0;url = ./index.php");
?>