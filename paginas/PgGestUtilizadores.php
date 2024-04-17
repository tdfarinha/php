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
	
	img{
		border-radius: 25px; /* Arredondar os cantos */
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
	td {
		font: normal 15px sans-serif;
		
	}
	
	th {
		font: bold 15px sans-serif;
		text-align: left
	}
	table, th, td {
		
		border-collapse: collapse;
		
	}
	th, td {
		padding: 15px 20px;
	}
	table#t01 tr:nth-child(even) {
		color:white;
		background-color: #1565c0;
	}
	table#t01 tr:nth-child(odd) {
		background-color: #f0f5f5;
		border-radius: 25px; /* Arredondar os cantos */
	}
	
	#btnNv{
		font: bold 19px sans-serif;
		margin-bottom: 20px;
		padding: 10px 70px;
	}
</style>  
<body>  
	<!-- GRAFISMO CABECALHO -->
<div id="cabecalho">
	<a href='../index.php'>
		<div id="logo">
		</div>
	</a>
    <div class= "input-div">
      <div id="botoes"> 
	<?php
		ob_start();
		session_start();
		
		if(isset($_SESSION["user"])){
			echo " <div id='botao'>
				<form action='./logout.php'>
					<input type='submit' value='Logout'>
				</form>
			</div>
			<div id='botao'>
				<form action='./PgUtilizador.php'>
					<input type='submit' value='Página Inicial'>
				</form>
			</div>
			";	
		}else {
			
			echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 2000)</script>";
			
		}
	?>
        <div id='botao'>
          <form action="../contatos.php">
            <input type='submit' value='Contactos'>
          </form>
        </div>
      </div>
    </div>
</div>
  <!-- GRAFISMO CORPO -->
<div id="corpo">
	
	<form action="./PgNaoExiste.php">
		<input type='submit' value='Novo Utilizador' id="btnNv">
	</form>
	
	<div id="tabela">
		<?php
			if(isset($_SESSION["user"])){
				include "../basedados/basedados.h";
				include "./ConstUtilizadores.php";
				// ==========================Quem é o utilizador==========================
				$sql = "SELECT tipo_user FROM utilizadores WHERE username='".$_SESSION["user"]."'";
							
				// ====================================================		
				$retval = mysqli_query( $conn, $sql );
				if(! $retval ){
					die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
				}
				$row = mysqli_fetch_array($retval);
				$tipo_user = $row["tipo_user"];
				
				$pode=true;
				
				if($tipo_user!=ADMINISTRADOR){
					$pode=false;
					echo "<script> setTimeout(function () { window.location.href = './index.php'; }, 000)</script>";
				}
				
				if($pode){
					// ====================================================
					$sql = "SELECT * FROM utilizadores";
					$retval = mysqli_query( $conn, $sql );
					if(! $retval ){
						die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
					}
					
					echo "<table width='100%' id = 't01'>
					<tr>
						<th>Nome Utilizador:</th>
						<th>Tipo:</th>
						<th>Telemóvel:</th>
						<th>Validar:</th>
						<th>Editar:</th>
						<th>Apagar/Inativar:</th>
					</tr>";
					while($row = mysqli_fetch_array($retval)){
						echo"
						<tr>
							<td>".$row["username"]."</td>
							<td>".getDescricaoUtilizador($row["tipo_user"])."</td>
							<td>".$row["telefone"]  ."</td>";
						//VALIDAR						
						if($row["tipo_user"] == ALUNO_NAO_VALIDADO)
							echo"	<td><a href='./validar.php?IdUser=".$row["username"]."' ><img src='./imgs/validar.png' width=50 height=50></a></td>";
						else
							echo"<td></td>";
						//EDITAR
						if($row["tipo_user"] != UTILIZADOR_APAGADO){
							echo"	<td><a href='preparaEditar.php?IdUser=".$row["username"]."' ><img src='./imgs/editar.png' width=50 height=50></a></td>";
						}else
							echo"<td></td>";
						//PROMOVER
						if($row["tipo_user"] != ADMINISTRADOR)
							echo "<td><a href='PgDespromover.php?IdUser=".$row["username"]."' ><img src='./imgs/remove.png' width=50 height=50></a></td>";
						else
							echo"<td></td>";
						
						
						
						echo "</tr>";	
					}
					echo"</table>";
				}
			}
			
			function getDescricaoUtilizador($tipoNumerico){
				
				switch($tipoNumerico){
					case ADMINISTRADOR:
						return "Administrador";
					break;
					case DOCENTE:
						return "Docente";
					break;
					case ALUNO:
						return "Aluno";
					break;
					case ALUNO_NAO_VALIDADO:
						return "Aluno Não Validado";
					break;
					case UTILIZADOR_APAGADO:
						return "Utilizador apagado";
					break;
					default:
						return "Desconhecido";
					break;
				}
				
			}
			
		?>
		
	</div>
</div>
</body>
</html>