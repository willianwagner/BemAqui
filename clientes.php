<?php

require __DIR__ . "../source/autoload.php";

use Source\Database\Connect;


class Clientes
{
    public $id;


    protected function conectApi($url)
    {

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        $result = curl_exec($ch);
        $result = json_decode($result, true);
        curl_close($ch);

        return $result;
    }

    public function listaLocatarios()
    {
        $pdo = Connect::getInstance();

        $locatarios = $pdo->query("SELECT * FROM cliente WHERE tipo IN ('I','A')")->fetchAll(PDO::FETCH_CLASS, "Clientes");

        return $locatarios;
    }
    public function listaLocadores()
    {
        $pdo = Connect::getInstance();

        $locatarios = $pdo->query("SELECT * FROM cliente WHERE tipo IN ('L','A')")->fetchAll(PDO::FETCH_CLASS, "Clientes");

        return $locatarios;
    }

    public function save()
    {
        $pdo = Connect::getInstance();
        $data = [
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'tipo' => $this->tipo,
            'status_id' => 1,
            'dia_repasse' => $this->dia_repasse,
            'created_at' => date("Y-m-d H:i:s"),
        ];

        $sql = "INSERT INTO cliente (nome, email, telefone, tipo, status_id, dia_repasse,created_at ) VALUES (:nome, :email, :telefone, :tipo, :status_id, :dia_repasse, :created_at)";
        $pdo->prepare($sql)->execute($data);
    }

    public function getLocador($id)
    {
        $pdo = Connect::getInstance();
        $sql = "SELECT * FROM cliente WHERE id = ".$id;
        $locador = $pdo->query($sql)->fetchAll(PDO::FETCH_CLASS, "Clientes");
        return $locador;
    }
}
