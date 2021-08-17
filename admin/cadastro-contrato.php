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

    <div aria-live="polite" aria-atomic="true" class="position-relative ">

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
    <div class="container-fluid mb-5 ">
        <div class="row">
        <?php include('sidebar.php') ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="h5">Cadastro de Contratos</h3>

                </div>

                <div class="container">
                    <div class="text-center font-bem-aqui-2 py-3" >
                        <h5 class="fw-light">Informe o imóvel para iniciar o cadastro.</h5>
                    </div>
                    <div class="text-center font-bem-aqui-2 py-1" id="resultadoBusca">
                      
                    </div>
                    <form method="POST" action="" name="buscarImovel" id="buscarImovel">
                        <div class="mb-3 row">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Informe o código do imóvel" name="codigo" value="71098001">
                                <button type="submit" class="btn btn-outline-secondary" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>

                            </div>
                        </div>
                    </form>

                    <div id="load" class="text-center pb-5"><img src="../assets/icons/load.gif" width="30"></div>
                    <form method="POST" action="../../ContratoController.php" name="cadastrarContrato" id="cadastrarContrato">
                        <h5 class="fw-light text-center font-bem-aqui-2 py-3">Dados do Imóvel</h5>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Código:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="codimovel" name="codimovel" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Endereço:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco" name="endereco" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Cidade:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="cidade" name="cidade" readonly>
                            </div>
                            <label class="col-sm-1 col-form-label">Estado:</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="uf" name="uf" readonly>
                            </div>
                        </div>
                        <hr>
                        <h5 class="fw-light text-center font-bem-aqui-2 py-3">Envolvidos</h5>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Locatário:*</label>
                            <div class="col-sm-4">
                                <select name="locatario_id" class="form-control" required>
                                    <option  selected disabled>Escolha um Locatário</option>
                                    <?php
                                    $locatarios = new Clientes;

                                    foreach ($locatarios->listaLocatarios() as $l) { ?>
                                        <option value=" <?php echo $l->id; ?>">
                                            <?php echo $l->nome; ?>
                                        </option>
                                    <?php } ?>
                                </select>

                            </div>

                            <label class="col-sm-2 col-form-label">Locador:*</label>
                            <div class="col-sm-4">
                                <select name="locador_id" class="form-control" required>
                                    <option  selected disabled>Escolha um Locador</option>
                                    <?php
                                    $locador = new Clientes;

                                    foreach ($locador->listaLocadores() as $l) { ?>
                                        <option value=" <?php echo $l->id; ?>">
                                            <?php echo $l->nome; ?>
                                        </option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <hr>
                        <h5 class="fw-light text-center font-bem-aqui-2 py-3">Dados Contrato</h5>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Data Início:*</label>
                            <div class="col-sm-4 py-2">
                                <input type="date" class="form-control" id="datainicio" name="datainicio" required>
                            </div>
                            <label class="col-sm-2 col-form-label">Data Fim:*</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="datafim" name="datafim" required>
                            </div>

                            <label class="col-sm-2 col-form-label">Taxa Adm:*</label>
                            <div class="col-sm-4 py-2">

                                <div class="input-group flex-nowrap ">
                                    <span class="input-group-text"> % </span>
                                    <input type="number" class="form-control " placeholder="Informe somente números" name="taxaadm" id="taxaadmForm" required>
                                </div>
                            </div>

                            <label class="col-sm-2 col-form-label">Valor Aluguel:*</label>
                            <div class="col-sm-4">

                                <div class="input-group flex-nowrap ">
                                    <span class="input-group-text" id="addon-wrapping">R$</span>
                                    <input type="number" class="form-control" placeholder="Informe somente números" name="valorcontrato" required>
                                </div>
                            </div>

                            <label class="col-sm-2 col-form-label">Valor Condomínio:*</label>
                            <div class="col-sm-4">

                                <div class="input-group flex-nowrap ">
                                    <span class="input-group-text" id="addon-wrapping">R$</span>
                                    <input type="number" class="form-control" placeholder="Informe somente números" name="valorcondominio" required>
                                </div>
                            </div>

                            <label class="col-sm-2 col-form-label">Valor IPTU:*</label>
                            <div class="col-sm-4">

                                <div class="input-group flex-nowrap ">
                                    <span class="input-group-text" id="addon-wrapping">R$</span>
                                    <input type="number" class="form-control" placeholder="Informe somente números" name="valoriptu" required>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row text-end">
                            <div class="col-md-1 col-3 offset-6 offset-md-10">
                                <a class="btn btn-dark text-white" href="/admin/index.php">
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
        $("#load").hide();
        $("#cadastrarContrato").hide();
        $('form[name="buscarImovel"]').submit(function(event) {
            event.preventDefault();
            $("#load").show();
            $.ajax(

                {
                    url: "../busca.php",
                    type: "GET",
                    data: $(this).serialize(),
                    dateType: 'json',
                    success: function(response) {


                        var resultado = JSON.parse(response);
                        //  var Endereco = resutlado.Endereco
                        if (resultado.totalItens == 0) {
                            $("#resultadoBusca").html('<h5 class="text-center fw-normal">Nenhum imóvel foi encontrado =( </h5>');
                            $("#resultadoBusca").show();
                            $("#cadastrarContrato").hide();
                            $('#cadastrarContrato').each(function() {
                                this.reset();
                            });

                            console.log('nada');
                        } else {
                            $("#resultadoBusca").hide();
                            $("#endereco").val(resultado[0].Endereco);
                            $("#cidade").val(resultado[0].Cidade);
                            $("#uf").val(resultado[0].UF);
                            $("#codimovel").val(resultado[0].Codigo);
                            $("#cadastrarContrato").show();
                            console.log(resultado[0].Endereco);
                        }
                        $("#load").hide();

                    }

                });

        })



        $('form[name="cadastrarContrato"]').submit(function(event) {
            event.preventDefault();

            $.ajax(

                {
                    url: "../ContratoController.php",
                    type: "POST",
                    data: $(this).serialize(),
                    dateType: 'json',
                    success: function(response) {

                        var resultado = JSON.parse(response);
                        console.log(resultado);
                        if (resultado.tipo == 'erro') {
                            var campo = '#' + resultado.campo + 'Form';

                            $(campo).addClass('is-invalid');
                            $("#erroTexto").html(resultado.msg);
                            $("#erro").toggle('show');
                            $("html, body").animate({
                                scrollTop: 0
                            }, "fast");

                        } else {
                            $("#sucessoTexto").html(resultado.msg);
                            $("#sucesso").toggle('show');
                            $("html, body").animate({
                                scrollTop: 0
                            }, "fast");

                            $('#cadastrarContrato').each(function() {
                                this.reset();
                            });
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