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
include "../basedados/basedados.h";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUser = $_POST["IdUser"];
    $username = $_POST["user"];
    // $password = $_POST["pass"]; // Você pode querer atualizar a senha também
    $email = $_POST["email"];
    $imagem = $_POST["imagem"];
    $morada = $_POST["morada"];
    $telemovel = $_POST["telemovel"];

    // Prepare a query
    $sql = "UPDATE utilizadores SET username=?, email=?, imagem=?, endereco=?, telefone=? WHERE username=?";
    
    // Inicialize a prepared statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind os parâmetros
    mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $imagem, $morada, $telemovel, $idUser);

    // Executar a query
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Dados atualizados com sucesso!');</script>";
        echo "<script>window.location.href = './PgUtilizador.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar os dados.');</script>";
        echo "<script>window.location.href = './DadosPessoais.php';</script>";
    }

    // Fechar a statement
    mysqli_stmt_close($stmt);
}

// Fechar a conexão
mysqli_close($conn);
?>
