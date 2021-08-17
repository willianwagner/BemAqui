<?php
session_start();

if (!$_SESSION) {
    header("Location: ../../index.php");
}

?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Imob do Will - Bem Aqui">
    <meta name="keywords" content="Imob, Aluguel, Compra, Grátis">

    <title>BEM AQUI!</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"> <img src="../assets/img/logo.webp" alt="logo" height="35px">
            BEM AQUI!</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3 text-dark" href="sair.php">Sair</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
        <?php include('sidebar.php') ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
             <h5 class="py-5">

                 Aqui você poderá realizar cadastros de clientes e registrar contratos
             </h5>
            </main>
        </div>
    </div>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src=" ../assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
</body>

</html>