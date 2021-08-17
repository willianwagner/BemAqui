<?php

require __DIR__ . "../source/autoload.php";

use Source\Database\Connect;


class Contrato
{
   
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

    public function listaContratos()
    {
        $pdo = Connect::getInstance();

        $contratos = $pdo->query("SELECT * FROM contrato")->fetchAll(PDO::FETCH_CLASS, "Contrato");

        return $contratos;
    }
   
    public function getContrato($imovel,$locador,$locatario)
    {
        $pdo = Connect::getInstance();
        $sql = "SELECT * FROM contrato WHERE imovel_id = ".$imovel." AND locador_id = ".$locador." AND locatario_id = ".$locatario." ORDER BY created_at DESC limit 1";
        $contratos = $pdo->query($sql)->fetchAll(PDO::FETCH_CLASS, "Contrato");

        return $contratos;
    }
    

    public function save()
    {
        $pdo = Connect::getInstance();
        $data = [
            'imovel_id' => $this->imovel_id,
            'dia_repasse' => $this->dia_repasse,
            'locador_id' => $this->locador_id,
            'locatario_id' => $this->locatario_id,
            'data_inicio' => $this->data_inicio,
            'data_fim' => $this->data_fim,
            'vlr_contrato' => $this->vlr_contrato,
            'taxa_adm' => $this->taxa_adm,
            'vlr_condominio' => $this->vlr_condominio,
            'vlr_iptu' => $this->vlr_iptu,
            'endereco' => $this->endereco,
            'cidade' => $this->cidade,
            'uf' => $this->uf,
            'status_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
        ];

        $sql = "INSERT INTO contrato (imovel_id, dia_repasse, locador_id, locatario_id, data_inicio, data_fim, vlr_contrato, taxa_adm, vlr_condominio, vlr_iptu, endereco, cidade, uf, status_id, created_at ) VALUES (:imovel_id, :dia_repasse, :locador_id, :locatario_id, :data_inicio, :data_fim, :vlr_contrato, :taxa_adm, :vlr_condominio, :vlr_iptu, :endereco, :cidade, :uf, :status_id, :created_at)";
        $pdo->prepare($sql)->execute($data);
    }
}
