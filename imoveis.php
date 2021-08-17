<?php

class Imoveis
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

    public function listaImoveis()
    {
        $dados = array(
            'fields'    =>
            array(
                'Codigo',
            ),
            'filter' =>
            array('UF' => 'SC'),

        );
        $postFields  =  json_encode($dados);
        $key         =  'c9fdd79584fb8d369a6a579af1a8f681'; //Informe sua chave aqui

        $url        =  'http://sandbox-rest.vistahost.com.br';
        $url        .=  '/imoveis/listar?key=' . $key;
        $url        .=  '&pesquisa=' . $postFields.'&showtotal=9';

        $lista = $this->conectApi($url);

        //Campos a retornar para página
        $dadosDetalhe = array(
            'fields' => array('Dormitorios', 'Vagas', 'Categoria', 'FotoDestaque', 'AreaTotal', 'ValorVenda','Cidade','UF','BanheiroSocialQtd','Status')
        );
        $camposDetalhes = '&pesquisa=' . json_encode($dadosDetalhe);

        foreach ($lista as $imob) {

            $detalhe =  'http://sandbox-rest.vistahost.com.br/imoveis/detalhes?key=c9fdd79584fb8d369a6a579af1a8f681&imovel=' . $imob['Codigo'] . $camposDetalhes;

            $dadosimob[] = $this->conectApi($detalhe);

           
        }

        return $dadosimob;
    }

    public function camposBusca(){
       
        //Alimentar as opções dos forms de busca

        $url = 'http://sandbox-rest.vistahost.com.br/imoveis/listarConteudo?key=c9fdd79584fb8d369a6a579af1a8f681&pesquisa={"fields":["UF","Cidade"]}';
        $campos[] = $this->conectApi($url);
        return $campos;
    }

}
