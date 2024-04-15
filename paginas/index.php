<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - FormEST</title>
    <meta name="description" content="O teu caminho para o conhecimento começa aqui - Bem-vindo ao FormEST">
    <link rel="icon" type="image/png" sizes="499x251" href="logotipo.png">
</head>

<body style="background: linear-gradient(rgba(47, 23, 15, 0.65), rgba(47, 23, 15, 0.65)), url('cat-wash-23775237.jpg');">
    <h1 class="text-center text-white d-none d-lg-block site-heading"><span class="text-primary site-heading-upper mb-3">o SALAO DE BELEZA PARA O SEU PET&nbsp;</span><span class="site-heading-lower">FormEST</span></h1>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark py-lg-4" id="mainNav">
        <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">FormEST</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarResponsive"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="servicos.php">Serviços</a></li>
                    <li class="nav-item"><a class="nav-link" href="horario.php">Horario</a></li>
                    <?php
                        session_start();

                        if(isset($_SESSION['utilizador'])){
                          switch ($_SESSION['tipo_user']){
                              case 1:
                                  echo '<li class="nav-item"><a class="nav-link" href="menu_cliente.php">Menu</a></li>';
                                  break;
                              case 2:
                                  echo '<li class="nav-item"><a class="nav-link" href="menu_funcionario.php">Menu</a></li>';
                                  break;
                              case 3:
                                  echo '<li class="nav-item"><a class="nav-link" href="menu_admin.php">Menu</a></li>';
                                  break;
                          }
                            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                        } else {
                           echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section clearfix"></section>
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="text-center cta-inner rounded">
                        <h2 class="section-heading mb-4"><span class="section-heading-upper">A nossa Promessa</span><span class="section-heading-lower">PARA Si</span></h2>
                        <p class="mb-0">When you walk into our shop to start your day, we are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products made with the highest quality ingredients. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-center footer text-faded py-5">
        <div class="container">
            <p class="m-0 small">Copyright&nbsp;©&nbsp;FormEST 2024</p>
        </div>
    </footer>
</body>

</html>
