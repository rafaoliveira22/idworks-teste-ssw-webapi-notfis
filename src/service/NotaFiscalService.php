<?php
    require_once 'src/model/NotaFiscalResponse.php';

    class NotaFiscalService{
        private string $url = 'https://ssw.inf.br/api/notfis';

        public function enviarNotaFiscal(string $token, NotaFiscalRequest $request): NotaFiscalResponse{
            $data = $this->mapearNotaFiscalRequestParaData($request);

            $ch = curl_init($this->url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: ' . $token
            ]);

            $response = curl_exec($ch);
            curl_close($ch);
    
            $responseDecode = json_decode($response, true);

            return new NotaFiscalResponse(
                $responseDecode['sucesso'],
                $responseDecode['mensagem'],
                $responseDecode['remetente'],
                $responseDecode['destinatario'],
                $responseDecode['notaFiscal'],
                $responseDecode['pedido'],
                $responseDecode['protocolo']
            );
        }

        private function mapearNotaFiscalRequestParaData(NotaFiscalRequest $request): array{
            return [
                'lote' => $request->lote,
                'dados' => array_map(function ($dado) {
                    return [
                        'cnpj' => $dado->cnpj,
                        'remetente' => $dado->remetente ? [
                            'cnpj' => $dado->remetente->cnpj,
                            'nome' => $dado->remetente->nome,
                            'inscr' => $dado->remetente->inscr,
                            'endereco' => [
                                'rua' => $dado->remetente->endereco->rua,
                                'numero' => $dado->remetente->endereco->numero,
                                'complemento' => $dado->remetente->endereco->complemento,
                                'bairro' => $dado->remetente->endereco->bairro,
                                'cidade' => $dado->remetente->endereco->cidade,
                                'uf' => $dado->remetente->endereco->uf,
                                'cep' => $dado->remetente->endereco->cep,
                            ],
                        ] : null,
                        'destinatario' => array_map(function ($destinatario) {
                            return [
                                'cnpj' => $destinatario->cnpj,
                                'nome' => $destinatario->nome,
                                'inscr' => $destinatario->inscr,
                                'telefone' => $destinatario->telefone,
                                'celular' => $destinatario->celular,
                                'email' => $destinatario->email,
                                'endereco' => [
                                    'rua' => $destinatario->endereco->rua,
                                    'numero' => $destinatario->endereco->numero,
                                    'complemento' => $destinatario->endereco->complemento,
                                    'bairro' => $destinatario->endereco->bairro,
                                    'cidade' => $destinatario->endereco->cidade,
                                    'uf' => $destinatario->endereco->uf,
                                    'cep' => $destinatario->endereco->cep,
                                ],
                                'nf' => array_map(function ($nf) {
                                    return [
                                        'tipoNF' => $nf->tipoNF,
                                        'cnpjPagador' => $nf->cnpjPagador,
                                        'condicaoFrete' => $nf->condicaoFrete,
                                        'numero' => $nf->numero,
                                        'serie' => $nf->serie,
                                        'chaveNFe' => $nf->chaveNFe,
                                        'dataEmissao' => $nf->dataEmissao,
                                        'qtdeVolumes' => $nf->qtdeVolumes,
                                        'valorMercadoria' => $nf->valorMercadoria,
                                        'codServico' => $nf->codServico,
                                        'tipoServico' => $nf->tipoServico,
                                        'pesoReal' => $nf->pesoReal,
                                        'cubagem' => $nf->cubagem,
                                        'pesoCubado' => $nf->pesoCubado,
                                        'pedido' => $nf->pedido,
                                        'placaColeta' => $nf->placaColeta,
                                        'valorFrete' => $nf->valorFrete,
                                        'valorICMS' => $nf->valorICMS,
                                        'freteInformado' => $nf->freteInformado ? [
                                            'fretePeso' => $nf->freteInformado->fretePeso,
                                            'freteValor' => $nf->freteInformado->freteValor,
                                            'valorPedagio' => $nf->freteInformado->valorPedagio,
                                            'valorTAR' => $nf->freteInformado->valorTAR,
                                            'valorDespacho' => $nf->freteInformado->valorDespacho,
                                            'valorITR' => $nf->freteInformado->valorITR,
                                            'valorCAT' => $nf->freteInformado->valorCAT,
                                            'valorGRIS' => $nf->freteInformado->valorGRIS,
                                            'outrosValores' => $nf->freteInformado->outrosValores,
                                            'valorRDC' => $nf->freteInformado->valorRDC,
                                        ] : null,
                                        'codigoConsolidador' => $nf->codigoConsolidador,
                                        'volumes' => $nf->volumes ? array_map(function ($volume){
                                            return [
                                                'codigo' => $volume->codigo,
                                                'qtdeVol' => $volume->qtdeVol,
                                            ];
                                        }, $nf->volumes) : null,
                                        'documentoAnterior' => $nf->documentoAnterior ? [
                                            'serieCte' => $nf->documentoAnterior->serieCte,
                                            'nroCte' => $nf->documentoAnterior->nroCte,
                                            'chaveCte' => $nf->documentoAnterior->chaveCte,
                                            'dataEmissao' => $nf->documentoAnterior->dataEmissao,
                                            'valorFrete' => $nf->documentoAnterior->valorFrete,
                                            'valorICMS' => $nf->documentoAnterior->valorICMS,
                                            'cidOrigem' => $nf->documentoAnterior->cidOrigem,
                                            'ufOrigem' => $nf->documentoAnterior->ufOrigem,
                                            'codIBGEOrigem' => $nf->documentoAnterior->codIBGEOrigem,
                                            'cidDestino' => $nf->documentoAnterior->cidDestino,
                                            'ufOrigem' => $nf->documentoAnterior->ufOrigem,
                                            'codIBGEDestino' => $nf->documentoAnterior->codIBGEDestino,
                                            'valorTDC' => $nf->documentoAnterior->valorTDC,
                                            'valorTDE' => $nf->documentoAnterior->valorTDE,
                                            'valorTRT' => $nf->documentoAnterior->valorTRT,
                                            'valorTAR' => $nf->documentoAnterior->valorTAR,
                                            'valorTDA' => $nf->documentoAnterior->valorTDA,
                                        ] : null,
                                        'prevEntrega' => $nf->prevEntrega,
                                        'codEmpresaContabil' => $nf->codEmpresaContabil,
                                        'itens' => $nf->itens ? array_map(function ($item) {
                                            return [
                                                'codigo' => $item->codigo,
                                                'descricao' => $item->descricao,
                                                'qtde' => $item->qtde,
                                                'valorUnit' => $item->valorUnit,
                                                'codigoNCM' => $item->codigoNCM,
                                                'unidade' => $item->unidade,
                                            ];
                                        }, $nf->itens) : null,
                                    ];
                                }, $destinatario->nf),
                            ];
                        }, $dado->destinatario),
                    ];
                }, $request->dados),
            ];
        }
    }
?>