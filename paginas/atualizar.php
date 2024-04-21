<?php
session_start();
include "../basedados/basedados.h";

// Verificar se a sessão está iniciada
if (!isset($_SESSION["user"])) {
    echo "<script>alert('Sessão expirada. Por favor, faça login novamente.');</script>";
    echo "<script>window.location.href = './index.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUser = $_POST["IdUser"];
    $username = $_POST["user"];
    // $password = $_POST["pass"]; // Você pode querer atualizar a senha também
    $email = $_POST["email"];
    $imagem = $_POST["imagem"];
    $morada = $_POST["morada"];
    $telemovel = $_POST["telemovel"];

    // Validar os dados (apenas um exemplo, você pode querer adicionar mais validações)
    if (empty($username) || empty($email) || empty($imagem) || empty($morada) || empty($telemovel)) {
        echo "<script>alert('Por favor, preencha todos os campos.');</script>";
        echo "<script>window.location.href = './DadosPessoais.php';</script>";
        exit;
    }

    // Prepare a query
    $sql = "UPDATE utilizadores SET username=?, email=?, imagem=?, endereco=?, telefone=? WHERE username=?";
    
    // Inicialize a prepared statement
    $stmt = mysqli_prepare($conn, $sql);

    // Verificar se a preparação foi bem-sucedida
    if ($stmt) {
        // Bind os parâmetros
        mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $imagem, $morada, $telemovel, $idUser);

        // Executar a query
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION["user"] = $username;
            echo "<script>alert('Dados atualizados com sucesso!');</script>";
            echo "<script>window.location.href = './PgUtilizador.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar os dados.');</script>";
            echo "<script>window.location.href = './DadosPessoais.php';</script>";
        }

        // Fechar a statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Erro na preparação da consulta.');</script>";
        echo "<script>window.location.href = './DadosPessoais.php';</script>";
    }
}

// Fechar a conexão
mysqli_close($conn);
?>
