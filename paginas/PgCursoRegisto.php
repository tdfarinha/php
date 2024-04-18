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
            header("Location:./index.php"); //envia para pagina
            die(); //Para a execução do PHP
			
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
    <!-- Formulário para registrar novo curso -->
    <h2>Registrar Novo Curso</h2>
    <form action="./PgCursoRegisto.php" method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" rows="4" cols="50" required></textarea><br><br>

        <label for="data_inicio">Data de Início:</label>
        <input type="date" name="data_inicio" required><br><br>

        <label for="data_fim">Data de Término:</label>
        <input type="date" name="data_fim" required><br><br>

        <label for="limite_alunos">Limite de Alunos:</label>
        <input type="number" name="limite_alunos" required><br><br>

        <label for="id_docente">Docente:</label>
        <select name="id_docente">
            <!-- Aqui você pode preencher os docentes do banco de dados -->
            <?php
            $sqlDocentes = "SELECT id_user, username FROM utilizadores WHERE tipo_user = 2";
            $resultDocentes = mysqli_query($conn, $sqlDocentes);
            while ($rowDocente = mysqli_fetch_assoc($resultDocentes)) {
                echo "<option value='" . $rowDocente['id_user'] . "'>" . $rowDocente['username'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="tipo_curso">Tipo de Curso:</label>
        <select name="tipo_curso">
            <!-- Aqui você pode preencher os tipos de curso do banco de dados -->
            <?php
            $sqlTipos = "SELECT id_tipo_curso, descricao FROM tipo_curso";
            $resultTipos = mysqli_query($conn, $sqlTipos);
            while ($rowTipo = mysqli_fetch_assoc($resultTipos)) {
                echo "<option value='" . $rowTipo['id_tipo_curso'] . "'>" . $rowTipo['descricao'] . "</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" name="registrar_curso" value="Registrar Curso">
    </form>

    <!-- Processamento do Formulário -->
    <?php
    if (isset($_POST['registrar_curso'])) {
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        $limite_alunos = $_POST['limite_alunos'];
        $id_docente = $_POST['id_docente'];
        $tipo_curso = $_POST['tipo_curso'];

        $sqlInsert = "INSERT INTO cursos (titulo, descricao, data_inicio, data_fim, limite_alunos, id_docente, tipo_curso)
                      VALUES ('$titulo', '$descricao', '$data_inicio', '$data_fim', '$limite_alunos', '$id_docente', '$tipo_curso')";
        
        if (mysqli_query($conn, $sqlInsert)) {
            echo "<p>Curso registrado com sucesso!</p>";
        } else {
            echo "<p>Erro ao registrar curso: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
</body>
</html>