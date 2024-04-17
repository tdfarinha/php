<?php
$id_user = $_POST["IdUser"];
include "../basedados/basedados.h";

$sql = "SELECT * FROM utilizadores WHERE username='$id_user'"; 
$res = mysqli_query ($conn, $sql);
$dados_user = mysqli_fetch_array ($res);
?>

<html>
<head>
<meta charset="UTF-8">
<title>FormaEst - Cursos para Formação</title>
<style>
  body{
    background-color: #f0f5f5; /* Azul claro */
    background-image:url(./imgs/cabecalho.png);
    background-position: top center;
    background-size: 1902px 1080px;
  }
  
  #atualizar-box{
    background-color:#f0f5f5; /* Azul claro */
    width:380px;
    height:580px;
    margin: 140px auto 0px;
    overflow:hidden;
    box-shadow:0px 0px 5px #6F6666;
    border-radius: 25px; /* Arredondar os cantos */
  }
  
  #atualizar-cabecalho{
    background-color:#1565c0; /* Azul escuro */
    height:50x;
    border-bottom:2px solid #1565c0; /* Azul escuro */
    text-align:center;
    font: bold 20px/50px sans-serif;
    color: white;
  }
  
  .input-div{
    margin:20px;
    padding: 5px;
    font: bold 14px sans-serif;
    color:#1565c0; /* Azul escuro */
   }
 
  .input-div input{
    width:325px;
    height:35px;
    padding-left:7px;
    font: normal 13px sans-serif;
    color:#1565c0; /* Azul escuro */
    border-radius: 25px; /* Arredondar os cantos */
  }
  #input-pass{
    margin-top:-15px;
  }
  #input-user{
    margin-top:10px;
  }
  #input-email{
    margin-top:-15px;
  }
  #input-imagem{
    margin-top:-15px;
  }
  #input-morada{
    margin-top:-15px;
  }
  #input-telemovel{
    margin-top:-15px;
  }
  
  #acoes{
    width:330px;
    margin:25px;
  }
  
  #atualizar{
    float:left;
    margin-top:-10px;
  }
  
  #volta{
	float:left;
    margin-top:-10px;
  }

  #reset{
	float:left;
    margin-top: 20px;
    }
  
  input[type=submit]{
    float:right;
    background-color:#1565c0; /* Azul escuro */
    padding: 10px 50px;
    margin-top:-15px;
    font: bold 13px sans-serif;
    color:white;
    box-shadow:2px 2px 5px #6F6666;
    cursor:pointer;
    border:0px;
    border-radius: 25px; /* Arredondar os cantos */
  }
  
  input[type=submit]:hover{
    box-shadow:1px 1px 5px #6F6666;
  }

  button {
    background-color: #f3ac1e;
    padding: 10px 20px;
    margin-top:-5px;
    font: bold 13px sans-serif;
    color: white;
    border: 0;
    cursor: pointer;
    box-shadow: 2px 2px 5px #ffffff;
    margin-right: 20px; /* Adiciona um espaço à direita */
    border-radius: 25px; /* Arredondar os cantos */
  }

  #reset {
    background-color: red;
  }

  
  button:hover {
    box-shadow: 1px 1px 5px #6F6666;
  }
  
</style>
<body>

	<?php
		session_start();
		if(!isset($_SESSION["user"]))
			echo "<script> setTimeout(function () { window.location.href = './index.php'; }, 0)</script>";
	
	?>
	
	<div id="atualizar-box">
	  <div id="atualizar-cabecalho">Dados Pessoais <?php echo $dados_user["username"]; ?></div>
	  
	  <form action="atualizar.php" method="POST">
    <input type="hidden" name="IdUser" value="<?php echo $dados_user["username"]; ?>">
		  <div class="input-div" id="input-user">
			 Username:
			 <input type="text" name="user" value="<?php echo $dados_user["username"]; ?>" readonly/>
       <p style="font-size: 12px; color: #f3ac1e;">Este campo é apenas para visualização. Para alterá-lo, entre em contato com o administrador.</p>
		  </div> 
		  
		  <!-- <div class="input-div" id="input-pass">
			  Password:
			 <input type="password" name="pass" value="<?php echo $dados_user["password"]; ?>"/>
		  </div> -->

          <div class="input-div" id="input-email">
			  E-mail:
			 <input type="email" name="email" value="<?php echo $dados_user["email"]; ?>"/>             
		  </div>

          <div class="input-div" id="input-imagem">
			  Imagem:
			 <input type="text" name="imagem" value="<?php echo $dados_user["imagem"]; ?>"/>             
		  </div>

          <div class="input-div" id="input-morada">
			  Morada:
			 <input type="text" name="morada" value="<?php echo $dados_user["endereco"]; ?>"/>
		  </div>

          <div class="input-div" id="input-telemovel">
			  Telemovel:
			 <input type="text" name="telemovel" value="<?php echo $dados_user["telefone"]; ?>"/>             
		  </div>
		  
		  <!--=====================Atualizar=====================-->
		  
		  <div id="acoes">
			<input type="submit" value ="Atualizar">
      <div id='volta'><button type='submit' formaction='./PgUtilizador.php'>Página Utilizador</button></div>
      <div> <button id ='reset' type='submit' formaction='./ResetPassword.php'>Reset Password</button></div>
	  </form>
	</div>
 
</body>	
</html>

