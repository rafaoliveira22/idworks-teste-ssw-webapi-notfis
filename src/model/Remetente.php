<?php

    class Remetente{
        public string $cnpj;
        public string $nome;
        public ?string $inscr;
        public Endereco $endereco;

        public function __construct(string $cnpj, string $nome, ?string $inscr = null, Endereco $endereco){
            verificarCampoPreenchimentoObrigatorio($cnpj, "cnpj");
            verificarCampoPreenchimentoObrigatorio($nome, "nome");
            verificarCampoPreenchimentoObrigatorio($endereco, "endereco");

            $this->cnpj = $cnpj;
            $this->nome = $nome;
            $this->inscr = $inscr;
            $this->endereco = $endereco;
        }
    }
?>