<?php
    class FreteInformado{
        public ?float $fretePeso;
        public ?float $freteValor;
        public ?float $valorPedagio;
        public ?float $valorTAR;
        public ?float $valorDespacho;
        public ?float $valorITR;
        public ?float $valorCAT;
        public ?float $valorGRIS;
        public ?float $outrosValores;
        public ?float $valorRDC;

        public function __construct(
            ?float $fretePeso = null, 
            ?float $freteValor = null, 
            ?float $valorPedagio = null, 
            ?float $valorTAR = null, 
            ?float $valorDespacho = null, 
            ?float $valorITR = null, 
            ?float $valorCAT = null, 
            ?float $valorGRIS = null, 
            ?float $outrosValores = null, 
            ?float $valorRDC = null, 
        ){
            // Os campos marcados com * são mutuamente exclusivos, ou seja, 
            // só há a necessidade de enviar apenas um deles na requisição.
            if($fretePeso === null && $freteValor === null){
                throw new InvalidArgumentException('Um dos campos "fretePeso" ou "freteValor" deve ser informado.');
            }
            $this->fretePeso = $fretePeso;
            $this->freteValor = $freteValor;
            $this->valorPedagio = $valorPedagio;
            $this->valorTAR = $valorTAR;
            $this->valorDespacho = $valorDespacho;
            $this->valorITR = $valorITR;
            $this->valorCAT = $valorCAT;
            $this->valorGRIS = $valorGRIS;
            $this->outrosValores = $outrosValores;
            $this->valorRDC = $valorRDC;
        }
    }
?>