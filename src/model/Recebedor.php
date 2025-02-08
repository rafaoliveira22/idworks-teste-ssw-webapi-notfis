<?php
    require_once 'src/Utils.php';
    
    class Recebedor{
        public string $cnpj;
        public string $nome;
        public string $local;
        public ?string $complemento;
        public string $bairro;
        public int $cep;

        public function __construct(
            string $cnpj,
            string $nome,
            string $local,
            string $complemento = null,
            string $bairro,
            int $cep,
        ){
            verificarCampoPreenchimentoObrigatorio($nome, "cnpj");
            verificarCampoPreenchimentoObrigatorio($nome, "nome");
            verificarCampoPreenchimentoObrigatorio($local, "local");
            verificarCampoPreenchimentoObrigatorio($bairro, "bairro");
            verificarCampoPreenchimentoObrigatorio($cep, "cep");

            verificarTamanhoString($local, "local", 50);
            if($complemento !== null) verificarTamanhoString($complemento, "complemento", 30);
            verificarTamanhoString($bairro, "bairro", 10);

            $this->cnpj = $cnpj;
            $this->nome = $nome;
            $this->local = $local;
            $this->complemento = $complemento;
            $this->bairro = $bairro;
            $this->cep = $cep;
        }
    }
?>