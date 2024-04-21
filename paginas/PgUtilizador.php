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
  
	#corpo{
	    width:1000px;
		background-color: #da4e03;
		margin: 8px auto 0px;
		border: 2px solid #1565c0;
		border-radius: 25px; /* Arredondar os cantos */
	}
  
	#btCorpo{
	  margin: 30px  auto 30px;
	  width:800px;
      height:100px;
      border: 2px solid #f0f5f5;
      font: bold 25px sans-serif;
	  color:white;
	}
  
    .botaoCorpo{
      margin-left: 100px ;
      margin-right: 100px ;
      margin-top:-8px;
	}
	
	#loading{
		background-color:#da4e03;
		width:380px;
		margin: 200px auto 0px;
		overflow:hidden;
		box-shadow:0px 0px 5px #6F6666;
		text-align:center;
		font: bold 20px/50px sans-serif;
		color: white;
	}
	
	#img{
		float:center;
		border: 2px solid #1565c0;
		background-color:#da4e03;
		margin:20px;
		float:right;
		border-radius: 25px; /* Arredondar os cantos */
	}
</style>  
<body>  
	
	<?php
	
		session_start();
		
		if(isset($_SESSION["user"])){
									
			// ===============================================================
			include '../basedados/basedados.h';
			include "./ConstUtilizadores.php";
			//Selecionar usuário correspondente da base de dados
			$sql = "SELECT * FROM utilizadores WHERE username = '".$_SESSION["user"]."'";
			$retval = mysqli_query( $conn, $sql );
			if(! $retval ){
				die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
			}
			$row = mysqli_fetch_array($retval);
			
			if($row["tipo_user"] != UTILIZADOR_NAO_VALIDADO && $row["tipo_user"] != UTILIZADOR_APAGADO){
				// ===============================================================
				
				echo"<div id='cabecalho'>
						<a href='./index.php'>
							<div id='logo'>
							</div>
						</a>
							<img src = './imgs/".$row['imagem']."' width=100 height = 100 id=img>
						<div class= 'input-div'>
							<div id='botao'>
								<form action='./logout.php'>
									<input type='submit' value='Logout'>
								</form>
							</div>
							<div id='botao'>
								<form action='./index.php'>
									<input type='submit' value='Página Principal'>
								</form>
							</div>
							<div id='botao'>
							  <form action='./contatos.php'>
								<input type='submit' value='Contactos'>
							  </form>
							</div>
						</div>
					</div>";
				
				//PERSONALIZAÇÃO
				switch($row["tipo_user"]){
						
					case ADMINISTRADOR:
						//==============================ADMINISTRADOR===============================//
						echo "<div id='corpo'>";
						printDadosPessoais();
						printGestãoUtilizadores();
						printGestãoCursos();
						printGestãoInscrições();
						echo"</div>";
					break;
					
					case DOCENTE:
						//===============================DOCENTE================================//
						echo "<div id='corpo'>";
						printDadosPessoais();
						printGestãoInscrições();
						echo"</div>";
					break;
											
					case ALUNO:
						//=================================ALUNO==================================//
						echo "<div id='corpo'>";
						printDadosPessoais();
						printGestãoInscrições();
						echo"</div>";
					break;
					
				}
				
			}else{
				header("Location:./logout.php"); //envia para logout
                die(); //Para a execução do PHP
			}
			
		}else{
			header("Location:./logout.php"); //envia para logout
            die(); //Para a execução do PHP
		}
		
		
		function printGestãoInscrições(){
			//Gestão de  Incrições
			echo 
			"<div class='botaoCorpo'>
				<form action='./PgGestIncricoes.php'>
					<input type='submit' value='Gestão Inscrições' id='btCorpo'>
				</form>
			</div>";
			
		}
		
		function printDadosPessoais(){
			//Dados Pessoais
			echo
			"<div class='botaoCorpo'>
				<form action= './DadosPessoais.php' method='POST'>
					<input type='text' name='IdUser' value='".$_SESSION["user"]."' hidden/>
					<input type='submit' value='Dados Pessoais' id='btCorpo'/>
				</form>
			</div>";
		}
		
		function printGestãoUtilizadores(){
			//Gestão Utilizadores
			echo 
			"<div class='botaoCorpo'>
				<form action='./PgGestUtilizadores.php'>
					<input type='submit' value='Gestão Utilizadores' id='btCorpo'>
				</form>
			</div>";
		}

		function printGestãoCursos(){
			//Gestão Cursos
			echo 
			"<div class='botaoCorpo'>
				<form action='./PgGestCursos.php'>
					<input type='submit' value='Gestão Cursos' id='btCorpo'>
				</form>
			</div>";
		}
	?>
</body>
</html>
