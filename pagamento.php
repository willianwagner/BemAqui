<?php

require __DIR__ . "../source/autoload.php";

use Source\Database\Connect;


class Pagamento
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

    public function listaPagamentos()
    {
        /* $pdo = Connect::getInstance();

        $contratos = $pdo->query("SELECT * FROM contrato")->fetchAll(PDO::FETCH_CLASS, "Contrato");

        return $contratos;  */
    }


    public function create()
    {
        $pdo = Connect::getInstance();
        $data = [
            'contrato_id' => $this->contrato_id,
            'num_parcela' => $this->num_parcela,
            'vlr_parcela' => $this->vlr_parcela,
            'status_id' => 5,
            'data_vencimento' => $this->data_vencimento,
            'created_at' => date("Y-m-d H:i:s"),
        ];

        $sql = "INSERT INTO pagamento (contrato_id, num_parcela, vlr_parcela, status_id, data_vencimento, created_at ) VALUES (:contrato_id, :num_parcela, :vlr_parcela, :status_id, :data_vencimento, :created_at)";
        $pdo->prepare($sql)->execute($data);
    }

    public function primeiraParcela($data, $valor)
    {
       
        $date  = strtotime($data);
        $dia_inicio   = date('d', $date);
        $mes_inicio = date('m', $date);
        $total_dias  = date('t', $date);

        $vlr_primeira =  ($valor / $total_dias) * ($total_dias - ($dia_inicio) );
        return $vlr_primeira;

    }

    

   
}
