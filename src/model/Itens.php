<?php
    require_once 'src/Utils.php';
    
    class Itens{
        public ?string $codigo;
        public ?string $descricao;
        public ?int $qtde;
        public ?float $valorUnit;
        public ?string $codigoNCM;
        public ?string $unidade;

        public function __construct(
            string $codigo,
            string $descricao,
            string $qtde,
            string $valorUnit,
            string $codigoNCM,
            string $unidade,
        ){
            $this->codigo = $codigo;
            $this->descricao = $descricao;
            $this->qtde = $qtde;
            $this->valorUnit = $valorUnit;
            $this->codigoNCM = $codigoNCM;
            $this->unidade = $unidade;
        }
    }
?>