<?php
    require_once 'src/Utils.php';
    
    class DocumentoAnterior{
        public string $serieCte;
        public int $nroCte;
        public string $chaveCte;
        public string $dataEmissao;
        public float $valorFrete;
        public float $valorICMS;
        public string $cidOrigem;
        public string $ufOrigem;
        public int $codIBGEOrigem;
        public string $cidDestino;
        public string $ufDestino;
        public int $codIBGEDestino;
        public ?float $valorTDC;
        public ?float $valorTDE;
        public ?float $valorTRT;
        public ?float $valorTAR;
        public ?float $valorTDA;

        public function __construct(
            string $serieCte,
            int $nroCte,
            string $chaveCte,
            string $dataEmissao,
            float $valorFrete,
            float $valorICMS,
            string $cidOrigem,
            string $ufOrigem,
            int $codIBGEOrigem,
            string $cidDestino,
            string $ufDestino,
            int $codIBGEDestino,
            ?float $valorTDC = null,
            ?float $valorTDE = null,
            ?float $valorTRT = null,
            ?float $valorTAR = null,
            ?float $valorTDA = null
        ) {
            verificarCampoPreenchimentoObrigatorio($serieCte, "serieCte");
            verificarCampoPreenchimentoObrigatorio($nroCte, "nroCte");
            verificarCampoPreenchimentoObrigatorio($chaveCte, "chaveCte");
            verificarCampoPreenchimentoObrigatorio($dataEmissao, "dataEmissao");
            verificarCampoPreenchimentoObrigatorio($valorFrete, "valorFrete");
            verificarCampoPreenchimentoObrigatorio($valorICMS, "valorICMS");
            verificarCampoPreenchimentoObrigatorio($cidOrigem, "cidOrigem");
            verificarCampoPreenchimentoObrigatorio($ufOrigem, "ufOrigem");
            verificarCampoPreenchimentoObrigatorio($codIBGEOrigem, "codIBGEOrigem");

            $this->serieCte = $serieCte;
            $this->nroCte = $nroCte;
            $this->chaveCte = $chaveCte;
            $this->dataEmissao = $dataEmissao;
            $this->valorFrete = $valorFrete;
            $this->valorICMS = $valorICMS;
            $this->cidOrigem = $cidOrigem;
            $this->ufOrigem = $ufOrigem;
            $this->codIBGEOrigem = $codIBGEOrigem;
            $this->cidDestino = $cidDestino;
            $this->ufDestino = $ufDestino;
            $this->codIBGEDestino = $codIBGEDestino;
            $this->valorTDC = $valorTDC;
            $this->valorTDE = $valorTDE;
            $this->valorTRT = $valorTRT;
            $this->valorTAR = $valorTAR;
            $this->valorTDA = $valorTDA;
        }
    }
?>