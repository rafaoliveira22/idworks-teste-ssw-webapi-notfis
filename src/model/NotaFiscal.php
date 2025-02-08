<?php
    class NotaFiscal
    {
        public ?TipoNotaFiscal $tipoNF = null;
        public ?string $cnpjPagador = null;
        public CondicaoFrete $condicaoFrete;
        public int $numero;
        public string $serie;
        public ?string $chaveNFe = null;
        public string $dataEmissao;
        public int $qtdeVolumes;
        public float $valorMercadoria;
        public ?int $codServico = null;
        public ?string $tipoServico = null;
        public float $pesoReal;
        public ?float $cubagem = null;
        public ?float $pesoCubado = null;
        public ?string $pedido = null;
        public ?string $placaColeta = null;
        public ?float $valorFrete = null;
        public ?float $valorICMS = null;
        public ?FreteInformado $freteInformado = null;
        public ?string $codigoConsolidador = null;
        /** @var array<Volumes> */
        public ?array $volumes = null;
        public ?DocumentoAnterior $documentoAnterior = null;
        public ?string $prevEntrega = null;
        public ?int $codEmpresaContabil = null;
        /** @var array<Itens> */
        public ?array $itens = null;

        public function __construct(
            ?TipoNotaFiscal $tipoNF = TipoNotaFiscal::NORMAL, 
            ?string $cnpjPagador = null,
            CondicaoFrete $condicaoFrete, 
            int $numero = 0,
            string $serie = "",
            ?string $chaveNFe = null,
            string $dataEmissao,
            int $qtdeVolumes,
            float $valorMercadoria,
            ?int $codServico = null,
            ?string $tipoServico = null,
            float $pesoReal,
            ?float $cubagem = null,
            ?float $pesoCubado = null,
            ?string $pedido = null,
            ?string $placaColeta = null,
            ?float $valorFrete = null,
            ?float $valorICMS = null,
            ?FreteInformado $freteInformado = null,
            ?string $codigoConsolidador = null,
            ?array $volumes = null,
            ?DocumentoAnterior $documentoAnterior = null,
            ?string $prevEntrega = null,
            ?int $codEmpresaContabil = null,
            ?array $itens = null
        ) {
            verificarCampoPreenchimentoObrigatorio($condicaoFrete, "condicaoFrete");
            verificarCampoPreenchimentoObrigatorio($dataEmissao, "dataEmissao");
            verificarCampoPreenchimentoObrigatorio($qtdeVolumes, "qtdeVolumes");
            verificarCampoPreenchimentoObrigatorio($valorMercadoria, "valorMercadoria");
            verificarCampoPreenchimentoObrigatorio($pesoReal, "pesoReal");

            $this->tipoNF = $tipoNF;
            $this->cnpjPagador = $cnpjPagador;
            $this->condicaoFrete = $condicaoFrete->value; 
            $this->numero = $numero;
            $this->serie = $serie;
            $this->dataEmissao = $dataEmissao;
            $this->qtdeVolumes = $qtdeVolumes;
            $this->valorMercadoria = $valorMercadoria;
            $this->pesoReal = $pesoReal;
            $this->chaveNFe = $chaveNFe;
            $this->codServico = $codServico;
            $this->tipoServico = $tipoServico;
            $this->cubagem = $cubagem;
            $this->pesoCubado = $pesoCubado;
            $this->pedido = $pedido;
            $this->placaColeta = $placaColeta;
            $this->valorFrete = $valorFrete;
            $this->valorICMS = $valorICMS;
            $this->freteInformado = $freteInformado;
            $this->codigoConsolidador = $codigoConsolidador;
            $this->volumes = $volumes;
            $this->documentoAnterior = $documentoAnterior;
            $this->prevEntrega = $prevEntrega;
            $this->codEmpresaContabil = $codEmpresaContabil;
            $this->itens = $itens;
        }
    }

?>