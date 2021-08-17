
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

var toastElList = [].slice.call(document.querySelectorAll('.toast'))
var toastList = toastElList.map(function(toastEl) {
  return new bootstrap.Toast(toastEl, option)
})

$(function() {
  $("#load").hide();

  $('form[name="buscarImoveis"]').submit(function(event) {
    event.preventDefault();

    $("#load").show();
    $(".ListaInicial").hide();
    $("#resultadoBusca").html('');
    $.ajax(

      {
        url: "/busca.php",
        type: "GET",
        data: $(this).serialize(),
        dateType: 'json',
        success: function(response) {

          var resultado = JSON.parse(response);

          if (resultado.totalItens == 0) {
            $("#resultadoBusca").html('<h5 class="text-center">Nenhum imóvel foi encontrado</h5>');
            $("#msgBusca").html('Resultado da sua Busca =(');
          } else {
            for (var i = 0; resultado.totalItens > i; i++) {
              var Cidade = resultado[i].Cidade;
              var Status = resultado[i].Status;
              var Uf = resultado[i].UF;
              var Codigo = resultado[i].Codigo;
              var Categoria = resultado[i].Categoria;
              var ValorVenda = resultado[i].ValorVenda;
              var TotalBanheiros = resultado[i].TotalBanheiros;
              var Dormitorios = resultado[i].Dormitorios;
              var Vagas = resultado[i].Vagas;
              var AreaTotal = resultado[i].AreaTotal;
              var FotoDestaque = resultado[i].FotoDestaque;
              if (FotoDestaque == '') {
                FotoDestaque = '<img src=" assets/img/ex-imovel.jpg" alt="imovel exemplo" height="210">';
              } else {
                FotoDestaque = '<img src="' + FotoDestaque + '" alt="imovel exemplo" height="210">'
              }
              if (TotalBanheiros == '') {
                TotalBanheiros = '0';
              }
              if (Dormitorios == '') {
                Dormitorios = '0';
              }
              if (Vagas == '') {
                Vagas = '0';
              }
              if (AreaTotal == '') {
                AreaTotal = '0';
              }


              var parte1 = '<div class="col-4 my-2"><div class="card shadow-sm"><div class="card-body"><div class="row">' + FotoDestaque + '</div> <div class="text-start font-bem-aqui-2 font-11">' + Status + '</div> <div class="card-text text-end font-bem-aqui-2 fw-bold">Cód ' + Codigo + '</div><div class="card-text text-start font-bem-aqui-2 ">Valor: ' + ValorVenda + '</div>';
              var parte2 = '<div class="card-text text-start font-bem-aqui-2 ">Categoria: ' + Categoria + '</div><div class="card-text text-center font-bem-aqui-2 "> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" /></svg>' + Cidade + ' - ' + Uf;
              var parte3 = '<div class="row py-3"><div class="col-3 text-center"><img src=" assets/icons/cama.webp" alt="quartos" height="30px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Quantidade de Quartos"><div class="block font-13 fw-light font-bem-aqui-2 fw-bold pt-3">' + Dormitorios + '</div></div>';
              var parte4 = '<div class="col-3 text-center"><img src=" assets/icons/chuveiro.webp" alt="banheiro" height="30px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Quantidade de Banheiros"><div class="block font-13 fw-light font-bem-aqui-2 fw-bold pt-3">' + TotalBanheiros + '</div></div>';
              var parte5 = '<div class="col-3 text-center"><img src=" assets/icons/carro.webp" alt="carro" height="30px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Carros na Garagem"><div class="block font-13 fw-light font-bem-aqui-2 fw-bold pt-3">' + Vagas + '</div></div>';
              var parte6 = '<div class="col-3 text-center"><img src=" assets/icons/tamanho.webp" alt="tamanho" height="30px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Tamanho do imóvel"><div class="block font-13 fw-light font-bem-aqui-2 fw-bold pt-3">' + AreaTotal + '</div></div>';
              var parte7 = '</div><div class="col-12  align-items-center text-center"><div class="btn-group"><button type="button" class="btn bg-bem-aqui-1 text-light  my-2"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" /><path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" /></svg> Ver Detalhes</button></div></div></div></div></div></div>';
              $("#resultadoBusca").append(parte1 + parte2 + parte3 + parte4 + parte5 + parte6 + parte7);
              $("#msgBusca").html('Resultado da sua Busca =)');


              console.log(resultado[i]);

            };
          }

          $("#load").hide();
        }

      });

  })
})
