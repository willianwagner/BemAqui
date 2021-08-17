<?php

$filters = array();

if (isset($_REQUEST['cidade'])) {
    if (!$_REQUEST['cidade'] == 0) {
        $filters['Cidade'] = urlencode($_REQUEST['cidade']);
    }
}
if (isset($_REQUEST['uf'])) {
    if (!$_REQUEST['uf'] == 0) {
        $filters['UF'] = urlencode($_REQUEST['uf']);
    }
}
if (isset($_REQUEST['categoria'])) {
    if (!$_REQUEST['categoria'] == 0) {
        $filters['Categoria'] = urlencode($_REQUEST['categoria']);
    }
}
if (isset($_REQUEST['dormitorios'])) {
    if (!$_REQUEST['dormitorios'] == 0) {
        $filters['Dormitorios'] = urlencode($_REQUEST['dormitorios']);
    }
}
if (isset($_REQUEST['codigo'])) {
    if (!$_REQUEST['codigo'] == 0) {
        $filters['Codigo'] = urlencode($_REQUEST['codigo']);
    }
}
if (isset($_REQUEST['status'])) {
    if (!$_REQUEST['status'] == 0) {
        $filters['Status'] = urlencode($_REQUEST['status']);
    }
}


//$filters['Status'] = 'VENDA';
//$filters['Dormitorios'] = '1';

$dados = array(
    'fields' =>
    array(
        'Dormitorios', 'Vagas', 'Categoria', 'FotoDestaque', 'AreaTotal', 'ValorVenda', 'Cidade', 'UF', 'TotalBanheiros', 'Codigo','Endereco','Status'
    ),
    'filter'    => $filters,

    'paginacao' =>
    array(
        'pagina' => 1,
        'quantidade' => 10
    )
);

$key         =  'c9fdd79584fb8d369a6a579af1a8f681'; //Informe sua chave aqui
$postFields  =  json_encode($dados);
$url         =  'http://sandbox-rest.vistahost.com.br/imoveis/listar?key=' . $key;
$url        .=  '&pesquisa=' . $postFields;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
$result = curl_exec($ch);
$statushttp = curl_getinfo($ch, CURLINFO_HTTP_CODE);


$result = json_decode($result, true);
$retornoBusca = array();


if ($statushttp == 200) {
    $retornoBusca['totalItens'] = sizeof($result);


    if (isset($result['message'])) {
        $result['totalItens'] = 0;
        echo json_encode($result);
    } else {
        $i = 0;
        foreach ($result as $r) {

            $retornoBusca[$i]['Dormitorios'] = $r['Dormitorios'];
            $retornoBusca[$i]['Vagas'] = $r['Vagas'];
            $retornoBusca[$i]['Categoria'] = $r['Categoria'];
            $retornoBusca[$i]['FotoDestaque'] = $r['FotoDestaque'];
            $retornoBusca[$i]['AreaTotal'] = $r['AreaTotal'];
            $retornoBusca[$i]['ValorVenda'] = $r['ValorVenda'];
            $retornoBusca[$i]['Cidade'] = $r['Cidade'];
            $retornoBusca[$i]['UF'] = $r['UF'];
            $retornoBusca[$i]['TotalBanheiros'] = $r['TotalBanheiros'];
            $retornoBusca[$i]['Codigo'] = $r['Codigo'];
            $retornoBusca[$i]['Endereco'] = $r['Endereco'];
            $retornoBusca[$i]['Status'] = $r['Status'];
            $i++;
        }
        echo json_encode($retornoBusca);
    }
} else {

    throw new Exception("Erro ao retornar dados", 500);
}

return;
