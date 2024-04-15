<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Cursos de Formação</title>
    <!-- Adicione aqui os seus estilos CSS -->
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gestão de Cursos de Formação</h1>
        <!-- Adicione aqui a navegação ou outras informações do cabeçalho -->
    </header>

    <main>
        <section>
            <h2>Informações da Empresa</h2>
            <!-- Adicione aqui informações sobre a empresa, como localização, horários de funcionamento, etc. -->
        </section>

        <section>
            <h2>Login de Usuário</h2>
            <!-- Formulário de login para alunos, docentes e administradores -->
            <form action="login.php" method="post">
                <label for="username">Nome de Usuário:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required><br>
                <button type="submit">Entrar</button>
            </form>
            <!-- Adicione aqui links para registro de novos usuários -->
        </section>
    </main>

    <footer>
        <p>Copyright&nbsp;©&nbsp;FormEST <?php echo date("Y"); ?> Sistema de Gestão de Cursos de Formação</p>
        <!-- Adicione aqui informações adicionais do rodapé -->
    </footer>
</body>
</html>
