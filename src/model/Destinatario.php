<?php

    class Destinatario{
        public string $cnpj;
        public string $nome;
        public ?string $inscr;
        public ?string $telefone;
        public ?string $celular;
        public ?string $email;
        public ?Expedidor $expedidor;
        public ?string $cnpjExpedidor;
        public Endereco $endereco;
        public ?Recebedor $recebedor;
        /** @var array<NotaFiscal> */
        public array $nf;

        public function __construct(?
            string $cnpj,
            string $nome,
            ?string $inscr = null,
            ?string $telefone = null,
            ?string $celular = null,
            ?string $email = null,
            ?Expedidor $expedidor = null,
            ?string $cnpjExpedidor = null,
            Endereco $endereco,
            Recebedor $recebedor = null,
            array $nf
        ) {
            verificarCampoPreenchimentoObrigatorio($cnpj, "cnpj");
            verificarCampoPreenchimentoObrigatorio($nome, "nome");
            verificarCampoPreenchimentoObrigatorio($endereco, "endereco");
            verificarCampoPreenchimentoObrigatorio($nf, "nf");

            $this->cnpj = $cnpj;
            $this->nome = $nome;
            $this->inscr = $inscr;
            $this->telefone = $telefone;
            $this->celular = $celular;
            $this->email = $email;
            $this->expedidor = $expedidor;
            $this->cnpjExpedidor = $cnpjExpedidor;
            $this->endereco = $endereco;
            $this->recebedor = $recebedor;
            $this->nf = $nf;
        }
    }

?>