<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
require('imoveis.php');

$campos = new Imoveis;

?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Imob do Will - Bem Aqui">
  <meta name="keywords" content="Imob, Aluguel, Compra, Grátis">

  <title>BEM AQUI!</title>

  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded" aria-label="Eleventh navbar example">
      <div class="container-fluid">
        <a class="navbar-brand ps-3 font-bem-aqui-2" href="/">
          <img src="assets/img/logo.webp" alt="logo" height="35px">
          BEM AQUI!
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse pe-5" id="navbarsExample09">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">2° Via de boleto</a>
            </li>
            <li class="nav-item px-md-5">
              <a class="nav-link" href="#">O que fazemos</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-bs-toggle="dropdown" aria-expanded="false">Fale Conosco</a>
              <ul class="dropdown-menu " aria-labelledby="dropdown09">
                <li><a class="dropdown-item contato" href="https://wa.me/5551999991111" target="_blank"> <img class="text-success" src=" assets/icons/whats.webp" alt="logo" height="20px"> Locação <br /><small> (51) 9 9999-1111</small></a></li>
                <li><a class="dropdown-item " href="https://wa.me/5551999992222" target="_blank"> <img class="text-success" src=" assets/icons/whats.webp" alt="logo" height="20px"> Financeiro <br /><small> (51) 9 9999-2222</small></a></li>
                <li><a class="dropdown-item" href="https://wa.me/5551999993333" target="_blank"> <img class="text-success" src=" assets/icons/whats.webp" alt="logo" height="20px"> Vendas <br /><small> (51) 9 9999-3333</small></a></li>

              </ul>
            </li>

          </ul>

        </div>
      </div>
    </nav>

  </header>

  <main>

    <section class="py-5 text-center container-fluid bg-banner ">
      <form action="/busca.php" name="buscarImoveis" method="post">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto bg-light rounded ">
            <h5 class="py-3 fw-normal font-bem-aqui-1 ">Encontre seu lar Bem Aqui!</h5>

            <div class="row g-3">

              <div class="col-sm-3">
                <select class="form-select font-12 py-2" name="status">
                  <option selected value="0">Tipo</option>
                  <option value="ALUGUEL">Alugar</option>
                  <option value="VENDA">Comprar</option>
                  <option value="VENDA E ALUGUEL">Comprar ou Alugar</option>


                </select>
              </div>
              <div class="col-sm-3">

                <select class="form-select font-12 py-2" name="categoria">
                  <option selected value="0"> Categoria</option>
                  <option value="Apartamento">Apartamento</option>
                  <option value="Casa de Alvenaria">Casa de Alvenaria</option>
                  <option value="Barracão">Barracão</option>
                </select>
              </div>
              <div class="col-sm-3">

                <select class="form-select font-12 py-2" name="dormitorios">
                  <option selected value="0">Dormitórios</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
              </div>
              <div class="col-sm-3">
                <input type="text" class="form-control font-12 py-2" name="codigo" placeholder="Código: Ex:71098001" aria-label="Codigo">
              </div>

              <div class="col-sm-6">

                <select class="form-select font-11 py-2" name="valores">
                  <option selected>Faixa de Valores</option>
                  <option value="0">Em Construção</option>
               
                </select>
              </div>

              <?php
              echo '<div class="col-sm-3"><select class="form-select font-12 py-2" name="cidade">';
              $cidade = $campos->camposBusca();
              echo '<option selected value="0">Cidade</option>';
              foreach ($cidade[0]['Cidade'] as $cidade) {
                echo ' <option value="' . $cidade . '">' . $cidade . '</option>';
              }

              echo '</select></div>';

              echo '<div class="col-sm-3"><select class="form-select font-12 py-2" name="uf">';
              echo '<option selected value="0">UF</option>';
              $uf = $campos->camposBusca();
              foreach ($uf[0]['UF'] as $uf) {
                echo ' <option value="' . $uf . '">' . $uf . '</option>';
              }
              echo '</select></div>';
              ?>


            </div>
            <p>
              <button type="submit" class="btn bg-bem-aqui-1 text-light my-2"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg> Buscar</button>

            </p>
          </div>
        </div>
      </form>
    </section>
    <div class="container-fluid bg-bem-aqui my-1 py-1 fw-light">
      <div class="block text-center text-white py-3 fs-3" id="msgBusca">Sugestões perto de você.</div>
    </div>
    <div id="load" class="text-center"><img src="assets/icons/load.gif" width="80"></div>
    <div class="py-5 bg-light">
      <div class="container">

        <div class="row" id="resultadoBusca"></div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php

          $lista = new Imoveis;

          foreach ($lista->listaImoveis() as $imovel) {

          ?>
            <div class="col ListaInicial">
              <div class="card shadow-sm">


                <div class="card-body">
                  <div class="row">
                    <?php
                    if ($imovel['AreaTotal'] === '') {
                      echo '<img src=" assets/img/ex-imovel.jpg" alt="imovel exemplo" height="210">';
                    } else {
                      echo '   <img src=" ' . $imovel['FotoDestaque'] . '" alt="imovel exemplo" height="210">';
                    }
                    ?>

                  </div>
                  <div class="text-start font-bem-aqui-2 font-11"> <?php echo $imovel['Status'] ?></div>
                  <div class="card-text text-end font-bem-aqui-2 fw-bold">Cód: <?php echo $imovel['Codigo'] ?></div>
                  <div class="card-text text-start font-bem-aqui-2 ">Valor :
                    <?php
                    if ($imovel['ValorVenda'] === '') {
                      echo 'Grátis';
                    } else {
                      echo 'R$ ' . number_format($imovel['ValorVenda'], 2, ',', '.');
                    }
                    ?>
                  </div>
                  <div class="card-text text-start font-bem-aqui-2 ">Categoria: <?php echo $imovel['Categoria'] ?></div>

                  <div class="card-text text-center font-bem-aqui-2 "> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                      <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                    </svg>
                    <?php echo $imovel['Cidade'] . ' - ' . $imovel['UF'] ?></div>
                  <div class="row py-3">
                    <div class="col-3 text-center"> 

                      <img src=" assets/icons/cama.webp" alt="quartos" height="30px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Quantidade de Quartos">
                      <div class="block font-13 fw-light font-bem-aqui-2 fw-bold pt-3">
                        <?php
                        if ($imovel['Dormitorios'] === '') {
                          echo '-';
                        } else {
                          echo $imovel['Dormitorios'];
                        }
                        ?>
                      </div>
                    </div>
                    <div class="col-3 text-center">
                      <img src=" assets/icons/chuveiro.webp" alt="banheiro" height="30px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Quantidade de Banheiros">
                      <div class="block font-13 fw-light font-bem-aqui-2 fw-bold pt-3">
                        <?php
                        if ($imovel['BanheiroSocialQtd'] === '') {
                          echo '-';
                        } else {
                          echo $imovel['BanheiroSocialQtd'];
                        }
                        ?>
                      </div>
                    </div>
                    <div class="col-3 text-center">
                      <img src=" assets/icons/carro.webp" alt="carro" height="30px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Carros na Garagem">
                      <div class="block font-13 fw-light font-bem-aqui-2 fw-bold pt-3">
                        <?php
                        if ($imovel['Vagas'] === '') {
                          echo '-';
                        } else {
                          echo $imovel['Vagas'];
                        }
                        ?>
                      </div>
                    </div>
                    <div class="col-3 text-center">
                      <img src=" assets/icons/tamanho.webp" alt="tamanho" height="30px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Tamanho do imóvel">
                      <div class="block font-13 fw-light font-bem-aqui-2 fw-bold pt-3">
                        <?php
                        if ($imovel['AreaTotal'] === '') {
                          echo '-';
                        } else {
                          echo $imovel['AreaTotal'] . 'm²';
                        }
                        ?>
                      </div>
                    </div>


                  </div>
                  <div class="col-12  align-items-center text-center">
                    <div class="btn-group">

                      <button type="button" class="btn bg-bem-aqui-1 text-light  my-2"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                          <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                        </svg> Ver Detalhes</button>
                    </div>

                  </div>
                </div>

              </div>
            </div>


          <?php
          }

          ?>

        </div>

      </div>
    </div>


    <div class="container-fluid  py-5">
      <div class="block text-center font-bem-aqui-2 py-3 fs-3 fw-light">ACOMPANHE POR AQUI AS NOVIDADES</div>
      <div class="text-center">
        <img class="p-3" src=" assets/icons/insta.webp" alt="Insta" height="80">
        <img class="p-3" src=" assets/icons/fb.webp" alt="Face" height="80">

      </div>
    </div>
  </main>

  <footer class="text-muted py-5 bg-dark">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
          </svg></a>
      </p>
      <div class="row">
        <div class="col-12 col-md-4">
          <div class="block">

            <a class="navbar-brand ps-3 font-bem-aqui-2 " href="/">
              <img src=" assets/img/logo.webp" alt="logo" height="35px">
              BEM AQUI!
            </a>
            <div class="flex py-3">
              Endereço: Rua do lugar certo, 10, Centro, Igrejinha-RS
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="col-12 py-1"><a class="text-decoration-none text-light " href="https://wa.me/5551999991111" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
              </svg> Locação: <small> (51) 9 9999-1111</small></a></div>
          <div class="col-12 py-1"><a class="text-decoration-none text-light " href="https://wa.me/5551999992222" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
              </svg> Financeiro: <small> (51) 9 9999-2222</small></a></div>


        </div>
        <div class="col-12 col-md-4 ">

          <div class="col-12 py-1"><a class="text-decoration-none text-light " href="https://wa.me/5551999993333" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
              </svg> Vendas: <small> (51) 9 9999-3333</small></a></div>
          <div class="col-12 pt-5 text-end fw-light fs-6"> Desenvolvido por W.W. </div>
          <div class="col-12  text-end fw-light fs-6"> <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Acesso Restrito </a> </div>


        </div>
      </div>


    </div>

    <!-- Modal -->
    <div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-bem-aqui-1" id="exampleModalLabel">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z" />
              </svg>
              Acesso Restrito
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="auth.php">
            <div class="modal-body ">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="usuario" name="email" value="will@will.com">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Senha</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" value="123" id="senha" name="senha">
                </div>
              </div>
            </div>
            <?php
            //Recuperando o valor da variável global, os erro de login.
            if (isset($_SESSION['loginErro'])) {
              echo $_SESSION['loginErro'];
              unset($_SESSION['loginErro']);
            } ?>

            <div class="modal-footer">
              <button type="button" class="btn btn-dark"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg> Fechar</button>
              <button type="submit" class="btn bg-bem-aqui-1 text-light" data-bs-dismiss="modal"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg> Entrar</button>
            </div>
        </div>
        </form>
      </div>
    </div>


  </footer>



  <script src=" assets/js/bootstrap.bundle.min.js"></script>
  <script src=" assets/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
  <script src=" assets/js/vista.min.js"></script>

</body>

</html>