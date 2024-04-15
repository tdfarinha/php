<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>FormaEst - Cursos para Formação</title>
  <style>
    body{
      background-image:url(./imgs/cabecalho.png);
      background-position: top center;
    }
    #loading{
      background-color:#f0f5f5; /* Azul claro */
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
</head>
<body>

<?php
session_start();

if(isset($_POST["user"]) && isset($_POST["pass"])){
  
  //Dados do formulário
  $utilizador = $_POST["user"];
  $password = $_POST["pass"];
  include '../basedados/basedados.h';
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
  if(strcmp($row["username"], $utilizador) == 0 && strcmp($row["password"], md5($password)) == 0){
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

</body>
</html>
