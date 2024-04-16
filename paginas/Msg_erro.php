<!DOCTYPE html>
<html>
<head>
<style>
  body{
    background-image:url(./imgs/atencao.png);
    background-position: top center;
  }
  
  #erro-box{
    background-color:#de5d02;
    width:800px;
    height:300px;
    margin: 140px auto 0px;
    overflow:hidden;
    box-shadow:0px 0px 5px #ffffff;
    border-radius: 25px; /* Arredondar os cantos */
  }
  
  #erro-cabecalho{
    background-color:#f3ac1e;
    height:50x;
    border-bottom:2px solid #e5dcd7;
    text-align:center;
    font: bold 20px/50px sans-serif;
    color: #ffffff;
  }
  
  .mensagem {
    margin: 50px auto; /* Centraliza verticalmente */
    width: 80%; /* Largura ajustável */
    text-align: center; /* Centraliza horizontalmente */
    font: bold 15px sans-serif;
    color:black;
  }
 
  #acoes{
    width:100%; /* Largura total */
    text-align: center; /* Centraliza horizontalmente */
    margin-top: 20px;
  } 
  
  #registo{
    float: left; /* Alinha à esquerda */
    margin-left: 20px; /* Adiciona um espaço à esquerda */
  }
  
  button {
    background-color: #f3ac1e;
    padding: 10px 20px;
    font: bold 13px sans-serif;
    color: white;
    border: 0;
    cursor: pointer;
    box-shadow: 2px 2px 5px #ffffff;
    margin-right: 20px; /* Adiciona um espaço à direita */
    border-radius: 25px; /* Arredondar os cantos */
  }
  
  button:hover {
    box-shadow: 1px 1px 5px #6F6666;
  }
  
</style>
</head>
<body>

<?php

  session_start();
  
  $msg = "Algo não correu bem!!! Dirija-se para a Página de Login ou Registe-se";
  $btn = "Página Login";
  $dir = "index.php";
  
  if(isset($_SESSION["erro"]))
    $msg = $_SESSION["erro"];
  if(isset($_SESSION["bt"]))
    $btn = $_SESSION["bt"];
  if(isset($_SESSION["dir"]))
    $dir = $_SESSION["dir"];
  
  echo "
  <div id='erro-box'>
    <div id='erro-cabecalho'>Lamentamos...</div>
 
    <div class='mensagem'>
      $msg
    </div> 
  <!--=====================Login=====================-->
    <form action='".$dir."'>
      <div id='acoes'>
        <div id='registo'><button type='submit' formaction='./PgRegisto.php'>Registe-se...</button></div>
        <button type='submit'>$btn</button>
      </div>
    </form>";
    
  session_destroy();
?>
</div>
  
</body> 
</html>
