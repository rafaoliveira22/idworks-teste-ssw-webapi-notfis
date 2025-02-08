<?php

    class Expedidor{
        public string $cnpj;
        public string $nome;
        public ?string $inscr;
        public ?string $email;
        public ?string $telefone;
        public ?string $celular;
        public Endereco $endereco;

        public function __construct(
            string $cnpj,
            string $nome,
            ?string $inscr = null,
            ?string $email = null,
            ?string $telefone = null,
            ?string $celular = null,
            Endereco $endereco,
        ){
            verificarCampoPreenchimentoObrigatorio($cnpj, "cnpj");
            verificarCampoPreenchimentoObrigatorio($nome, "nome");
            verificarCampoPreenchimentoObrigatorio($endereco, "endereco");

            $this->cnpj = $cnpj;
            $this->nome = $nome;
            $this->inscr = $inscr;
            $this->email = $email;
            $this->telefone = $telefone;
            $this->celular = $celular;
            $this->endereco = $endereco;
        } 
    }

?>