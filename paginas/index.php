<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>FormaEst - Cursos para Formação</title>
</head>
<style>  
  
	body{
		background-color: #f0f5f5; /* Azul claro */
		background-image: url(./imgs/cabecalho.png);
	}
	#cabecalho{
		margin: -8px;
		height: 200px;
		background-image: url(./imgs/cabecalho.png);
		background-size: 1902px 250px;
		border: 2px solid #1565c0; /* Azul escuro */
	}
	
	.input-div{    
		margin:25px;
		float:right;
		height:150px;
	}
  
	input[type=submit]{
   
		background-color: #1565c0; /* Azul escuro */
		padding:10px 20px;
		height:50px;
		font: bold 15px sans-serif;
		color:white;
		box-shadow:2px 2px 5px #888888; /* Cinza */
		cursor:pointer;
		border:0px;
		border-radius: 25px; /* Arredondar os cantos */
	}
	
	input[type=submit]:hover{
		box-shadow:1px 1px 5px #888888; /* Cinza */
	}
	
	#botoes{
		margin:70px;
	}
  
	#botao{
		float:right;
		margin:10px;
	}
  
	#logo{
		float:left;
		background-image:url(./imgs/logo_tipo.png);
		background-size: 188px 75px;
		margin-left:80px;
		margin-top:90px;
		width:180px;
		height:60px;
		border-radius: 25px; /* Arredondar os cantos */
	}
	
	a:link{
		color:#1565c0; /* Azul escuro */
		font: bold 15px sans-serif;
		text-decoration:none;
	}
	a:visited{
		color:#1565c0; /* Azul escuro */
		font: bold 15px sans-serif;
		text-decoration:none;
	}
	
	#corpo{
		width: 1000px;
		margin: 8px auto 0px;
		background-image: url(./imgs/cabecalho.png);
		background-size: 1902px 250px;
		border: 2px solid #1565c0; /* Azul escuro */
		border-radius: 25px; /* Arredondar os cantos */
		
	}
	#tabela{
		width:1000px;
		margin: 0px auto 0px;
	}
	#preco{
		font: normal 15px sans-serif;
		text-align: right;
	}
	
	#titulo{
		font: bold 15px sans-serif;
		text-decoration:no;
		text-align: left;
	}
	table, th, td {
		border-collapse: collapse;
	}
	th, td {
		padding: 15px 50px;
	}
	table#t01 tr:nth-child(even) {
		background-color: #E3F2FD; /* Azul claro */
	}
	table#t01 tr:nth-child(odd) {
		background-color: #BBDEFB; /* Azul médio */
	}
</style> 
 
<body>  
	<!-- GRAFISMO CABECALHO -->
<div id="cabecalho">
	<a href='index.php'>
		<div id="logo">
		</div>
	</a>
    <div class= "input-div">
		<div id="botoes"> 
			<?php
				ob_start();
				session_start();
				
				if(isset($_SESSION["user"])){
					
					$user = $_SESSION["user"];
					unset($_SESSION);
					$_SESSION["user"] = $user;
					
					echo "
						<div id='botao'>
							<form action='./logout.php'>
								<input type='submit' value='Logout'>
							</form>
						</div>
						<div id='botao'>
							<form action='./PgUtilizador.php'>
								<input type='submit' value='Area Pessoal'>
							</form>
						</div>
					";	
				}else {
					
					echo "
						<div id='botao'>
							<form action='./PgLogin.php'>
								<input type='submit' value='Login'>
							</form>
						</div>
						<div id='botao'> 
							<form action='./PgRegisto.php'>
								<input type='submit' value='Registe-se'>
							</form>
						</div>
					";
					
				}
			?>
			<div id='botao'>
				<form action="contatos.php">
					<input type='submit' value='Contactos'>
				</form>
			</div>
		</div>
    </div>
</div>
  <!-- GRAFISMO CORPO -->
  <div id="corpo">
    <h1>Bem-vindo ao FormaEst!</h1>
    <p>Seja bem-vindo(a) ao nosso site! Aqui você encontrará uma variedade de cursos para sua formação.</p>
    
    <h2>Tipos de Cursos:</h2>
    <ul>
        <li>CTSP (Cursos Técnicos de Nível Superior)</li>
        <li>Licenciatura</li>
        <li>Mestrado</li>
    </ul>
    
    <h2>Cursos Disponíveis:</h2>
    <ul>
        <li>Curso de CTSP em Tecnologia da Informação</li>
        <li>Licenciatura em Engenharia Informática</li>
        <li>Mestrado em Grandes Projetos em PHP</li>
        <!-- Podemos add mais cursos conforme seja preciso -->
    </ul>
</div>

</body>
</html>