<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Site de Cursos de Formação</title>
</head>
<body>
    <h1>Bem-vindo ao Web Site de Cursos de Formação</h1>

    <h2>Dados da Empresa</h2>
    <p><strong>Localização:</strong> Endereço da empresa</p>
    <p><strong>Horários de Funcionamento:</strong> Horários de funcionamento da empresa</p>
    <p><strong>Preços:</strong> Preços dos cursos oferecidos</p>

    <h2>Registar-se como Cliente</h2>
    <form method="POST" action="registrar.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>
        <button type="submit">Registar</button>
    </form>
</body>
</html>
