<?php

require('clientes.php');

/*Validações*/
$validacao = array();

if (strlen($_POST['nome']) < 3) {
   
    $validacao['tipo'] = 'erro';
    $validacao['campo'] = 'nome';
    $validacao['msg'] = 'Campo nome deve ter mais de 3 caracteres';

    echo json_encode($validacao);
    return;
}

$cliente = new Clientes;

$cliente->nome = $_POST['nome'];
$cliente->email = $_POST['email'];
$cliente->telefone = $_POST['telefone'];
$cliente->tipo = $_POST['tipo'];
$cliente->dia_repasse = $_POST['diarepasse'];

$cliente->save();

echo json_encode('Cadastro realizado com sucesso !');
return;

var_dump($cliente);

