<?php
    require_once 'src/service/TokenService.php';
    require_once 'src/service/NotaFiscalService.php';
    require_once 'src/model/NotaFiscalRequest.php';
    require_once 'src/model/Dados.php';
    require_once 'src/model/Remetente.php';
    require_once 'src/model/Destinatario.php';
    require_once 'src/model/Endereco.php';
    require_once 'src/model/Recebedor.php';
    require_once 'src/model/NotaFiscal.php';
    require_once 'src/model/Itens.php';
    require_once 'src/model/TokenRequest.php';
    require_once 'src/enum/TipoNotaFiscal.php';
    require_once 'src/enum/CondicaoFrete.php';

    $tokenService = new TokenService();
    $notaFiscalService = new NotaFiscalService();
    $notaFiscalRequest = new NotaFiscalRequest(
        '12345', 
        [
            new Dados(
                null, 
                new Remetente(
                    '00000000000001', 
                    'JOAO', 
                    'ISENTO',  
                    new Endereco(
                        'RUA TESTE', 
                        '1',   
                        null, 
                        'CENTRO',  
                        'SAO PAULO', 
                        'SP',   
                        '1000000'
                    )
                ), 
                [
                    new Destinatario(
                        '00000000000002',
                        'MARIA', 
                        null,   
                        '11 12345-6789', 
                        '11 98765-4321', 
                        'maria@maria.com.br', 
                        null, 
                        null,
                        new Endereco(
                            'ESTRADA TESTE',
                            '10',  
                            null,    
                            'CENTRO', 
                            'SAO PAULO', 
                            'SP', 
                            '1000001'  
                        ),
                        new Recebedor(
                            '00000000000003', 
                            'LOCAL DE ENTREGA',  
                            'RUA DE ENTREGAS, 150', 
                            null,   
                            'TESTE', 
                            '1000999'  
                        ),
                        [ 
                            new NotaFiscal(
                                TipoNotaFiscal::NORMAL, 
                                null,     
                                CondicaoFrete::FOB,  
                                2234,  
                                '',  
                                '35170606030025000114550010000022341573260714',
                                '03/07/2017',  
                                1,  
                                12.45, 
                                null,  
                                null, 
                                123.5, 
                                123.5,   
                                null, 
                                '987654321',  
                                null, 
                                null, 
                                null, 
                                null, 
                                null, 
                                null, 
                                null,
                                null,
                                null,
                                null                    
                            ),
                            new NotaFiscal(
                                TipoNotaFiscal::NORMAL, 
                                null, 
                                CondicaoFrete::CIF, 
                                344239,
                                '97',  
                                '31170614314050000409550970003442391026409473',
                                '2017-07-03',
                                1,
                                12.45,
                                null,
                                null,
                                123.5,
                                null,
                                null,
                                '123456789',
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                [
                                    new Itens(
                                        '00001',  
                                        'DESCRICAO', 
                                        1,     
                                        1.99, 
                                        '99999999',     
                                        'UN'              
                                    )
                                ]
                            )
                        ]
                    )
                ] 
            )
        ]
    );

    try{
        $token = $tokenService->gerarToken(new TokenRequest('TES', 'user', 'pass', '12345678910124', false));
        if($token->sucess !== true) {
            echo json_encode($token, JSON_PRETTY_PRINT);
            return $token;
        } else{ 
            $response = $notaFiscalService->enviarNotaFiscal($token->token, $notaFiscalRequest);
            echo json_encode($response, JSON_PRETTY_PRINT);
            return $response;
        }
    } catch(Exception $e){
        echo $e->getMessage();
    }
?>