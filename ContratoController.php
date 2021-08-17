<?php

require('contrato.php');
require('clientes.php');
require('pagamento.php');


/*Validações*/
$validacao = array();

 if ($_POST['taxaadm'] > 100) {

    $validacao['tipo'] = 'erro';
    $validacao['campo'] = 'taxaadm';
    $validacao['msg'] = 'A Taxa de Administração não deve ser a cima de 100%';

    echo json_encode($validacao);
    return;
} 

$locador =  new Clientes;
$contrato =  new Contrato;
$pagamento =  new Pagamento;

 $dados_locador = $locador->getLocador($_POST['locador_id']);

$contrato->imovel_id = $_POST['codimovel'];
$contrato->endereco = $_POST['endereco'];
$contrato->cidade = $_POST['cidade'];
$contrato->uf = $_POST['uf'];
$contrato->dia_repasse = $dados_locador[0]->dia_repasse;
$contrato->locador_id = $_POST['locador_id'];
$contrato->locatario_id = $_POST['locatario_id'];
$contrato->data_inicio = $_POST['datainicio'];
$contrato->data_fim = $_POST['datafim'];
$contrato->vlr_contrato = $_POST['valorcontrato'];
$contrato->taxa_adm = $_POST['taxaadm'];
$contrato->vlr_condominio = $_POST['valorcondominio'];
$contrato->vlr_iptu = $_POST['valoriptu'];  


$contrato->save();
//Retonar o id do ultimo contrato gerado
$contratoId = $contrato->getContrato($contrato->imovel_id,$contrato->locador_id,$contrato->locatario_id);

$vlr_demais = floatval($contrato->vlr_contrato);

$data = date('Y/m/d', strtotime($contrato->data_inicio));

//$m para auxiliar no calculo do mês;
$m = 1;

for ($i = 1; $i <= 12; $i++) {
    $pagamento->contrato_id = $contratoId[0]->id;
    $pagamento->num_parcela = $i;
   
    if ($i == 1) {
        $pagamento->vlr_parcela = $pagamento->primeiraParcela($contrato->data_inicio, floatval($contrato->vlr_contrato));
        $proximo_mês = '+' . $m . 'month';
        $data = date('Y/m/d', strtotime($proximo_mês));
        $pagamento->data_vencimento = $data;

        $pagamento->create();
        $m++;
    } else {
        $proximo_mês = '+' . $m . 'month';
        $data = date('Y/m/1', strtotime($proximo_mês));
        $pagamento->data_vencimento = $data;
        $pagamento->vlr_parcela = floatval($contrato->vlr_contrato);
        $pagamento->create();
        $m++;
    }
 
    $pagamento->data_vencimento = $data;

    }

echo json_encode($contrato);
return;
