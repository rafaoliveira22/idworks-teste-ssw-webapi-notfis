<?php
    class NotaFiscalRequest{
        public ?string $lote;
        /** @var array<Dados> */
        public array $dados;

        public function __construct(?string $lote = null, array $dados){
            $this->lote = $lote;
            $this->dados = $dados;
        }
    }
?>