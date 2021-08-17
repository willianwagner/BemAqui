<?php
session_start();

if (!$_SESSION) {
    header("Location: ../../index.php");
}
require('../clientes.php');



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
        <a class="navbar-brand  col-md-3 col-lg-2 me-0 px-3" href="../admin/index.php"> <img src="../assets/img/logo.webp" alt="logo" height="35px">
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
        <div aria-live="polite" aria-atomic="true" class="position-relative">

            <div class="toast-container position-absolute top-0 end-0 p-3">

                <div class="toast bg-bem-aqui" role="alert" aria-live="assertive" aria-atomic="true" id="sucesso">
                    <div class="toast-header ">
                        <img src="../assets/img/logo.webp" alt="logo" height="25px">
                        <strong class="m-auto"> Sucesso!!</strong>

                    </div>
                    <div class="toast-body text-white" id="sucessoTexto">
                        <strong> Cadastro realizado.</strong>
                    </div>
                </div>

                <div class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true" id="erro">
                    <div class="toast-header ">
                        <img src="../assets/img/logo.webp" alt="logo" height="25px">
                        <strong class="m-auto"> Opss!</strong>

                    </div>
                    <div class="toast-body text-white" id="erroTexto">
                        Algo deu errado, revise o cadastro.
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
        <?php include('sidebar.php') ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="h5">Cadastro de Cliente</h3>

                </div>

                <div class="container">
                    <form method="POST" action="../../cadastro.php" name="cadastrarCliente" id="cadastrarCliente">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nome:*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nomeForm" name="nome" placeholder="Ex: Willian" required maxlength="45">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">E-mail:*</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ex: willian@wio.com" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Telefone:*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Ex: (51) 9 9999.5555" required onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Tipo:*</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="tipo" id="diaRepasse" onChange="diaRep()" required>
                                    <option value="" selected disabled class="form-control">Escolha um Tipo</option>
                                    <option value="I">Locatário</option>
                                    <option value="L">Locador</option>
                                    <option value="A">Locatário/Locador</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row" id="repasse">
                            <label class="col-sm-3 col-form-label">Dia Repasse:*</label>
                            <div class="col-sm-9">
                                <select name="diarepasse" class="form-control">
                                    <option value="5" selected>5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>
                        <div class="row text-end">
                            <div class="col-md-1 col-3 offset-6 offset-md-10">
                                <a class="btn btn-dark text-white" href="javascript: history.back() ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                    </svg>
                                    Voltar</a>
                            </div>
                            <div class="col-md-1 col-3">

                                <button type="submit" class="btn bg-bem-aqui-1 text-light"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                                    </svg>
                                    Salvar
                                </button>
                            </div>

                        </div>

                    </form>
                </div>

        </div>
        </main>
    </div>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src=" ../assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script type="text/javascript">
        function mask(o, f) {
            setTimeout(function() {
                var v = mphone(o.value);
                if (v != o.value) {
                    o.value = v;
                }
            }, 1);
        }

        function mphone(v) {
            var r = v.replace(/\D/g, "");
            r = r.replace(/^0/, "");
            if (r.length > 10) {
                r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
            } else if (r.length > 5) {
                r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
            } else if (r.length > 2) {
                r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
            } else {
                r = r.replace(/^(\d*)/, "($1");
            }
            return r;
        }

        $("#repasse").hide();

        function diaRep() {
            var select = document.getElementById('diaRepasse');
            var option = select.options[select.selectedIndex];

            if (option.value == 'A' || option.value == 'L') {

                $("#repasse").show();

            } else {
                $("#repasse").hide();
            }

        }

        $('form[name="cadastrarCliente"]').submit(function(event) {
            event.preventDefault();

            $.ajax(

                {
                    url: "../../ClienteController.php",
                    type: "POST",
                    data: $(this).serialize(),
                    dateType: 'json',
                    success: function(response) {

                        var resultado = JSON.parse(response);
                        if (resultado.tipo == 'erro') {
                            var campo = '#' + resultado.campo + 'Form';

                            $(campo).addClass('is-invalid');
                            $("#erroTexto").html(resultado.msg);
                            $("#erro").toggle('show');
                        } else {
                            $("#sucessoTexto").html(resultado.msg);
                            $("#sucesso").toggle('show');

                            $('#cadastrarCliente').each(function() {
                                this.reset();
                            });
                            $("#repasse").hide();
                        }

                        setTimeout(function() {
                            $('.toast').fadeOut('fast');
                        }, 4000);
                    }

                });

        })
    </script>
</body>

</html>