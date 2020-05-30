<?php
    
    $cep_origem = "13045770"; // CEP do remetente (neste caso, da Unip)
    $cep_destino = $_POST['cep'];

    if ( $cep_destino == 0 || strlen($cep_destino) != 8 ) {
        echo "<p>Frete inválido ! </p>";
    } 
    else {

        /* Dados do produto que será enviado (neste caso, fictício) */
        $peso          = 1;
        $valor         = 0;
        $altura        = 10;
        $largura       = 10;
        $comprimento   = 15;

        /* Calculo do serviço PAC */
        $tipo_do_frete = '41106'; //Código Pac

        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
        $url .= "nCdEmpresa=";
        $url .= "&sDsSenha=";
        $url .= "&sCepOrigem=" . $cep_origem;
        $url .= "&sCepDestino=" . $cep_destino;
        $url .= "&nVlPeso=" . $peso;
        $url .= "&nVlLargura=" . $largura;
        $url .= "&nVlAltura=" . $altura;
        $url .= "&nCdFormato=1";
        $url .= "&nVlComprimento=" . $comprimento;
        $url .= "&sCdMaoProria=n";
        $url .= "&nVlValorDeclarado=" . $valor;
        $url .= "&sCdAvisoRecebimento=n";
        $url .= "&nCdServico=" . $tipo_do_frete;
        $url .= "&nVlDiametro=0";
        $url .= "&StrRetorno=xml";

        $xml = simplexml_load_file($url);
        $frete =  $xml->cServico;

        echo "<input type='radio' name='frete'>Valor PAC: R$ ".$frete->Valor." | Prazo: ".$frete->PrazoEntrega." dias úteis.<br /></input>";


        /* Calculo do serviço SEDEX */
        $tipo_do_frete = '40010'; //Código Sedex

        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
        $url .= "nCdEmpresa=";
        $url .= "&sDsSenha=";
        $url .= "&sCepOrigem=" . $cep_origem;
        $url .= "&sCepDestino=" . $cep_destino;
        $url .= "&nVlPeso=" . $peso;
        $url .= "&nVlLargura=" . $largura;
        $url .= "&nVlAltura=" . $altura;
        $url .= "&nCdFormato=1";
        $url .= "&nVlComprimento=" . $comprimento;
        $url .= "&sCdMaoProria=n";
        $url .= "&nVlValorDeclarado=" . $valor;
        $url .= "&sCdAvisoRecebimento=n";
        $url .= "&nCdServico=" . $tipo_do_frete;
        $url .= "&nVlDiametro=0";
        $url .= "&StrRetorno=xml";

        $xml = simplexml_load_file($url);
        $frete =  $xml->cServico;

        echo "<input type='radio' name='frete'>Valor SEDEX: R$ ".$frete->Valor." | Prazo: ".$frete->PrazoEntrega." dias úteis.<br /></input>";

        echo "<br /><input type='submit' value='Fazer cadastro'>";
        
    }

 ?>
