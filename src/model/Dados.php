<?php

    class Dados{
        public ?string $cnpj;
        public ?Remetente $remetente;
        /** @var array<Destinatario> */ //docblocks
        public array $destinatario;

        public function __construct(
            ?string $cnpj = null,
            ?Remetente $remetente = null,
            array $destinatario
        ){
            // Os campos marcados com * são mutuamente exclusivos, ou seja, 
            // só há a necessidade de enviar apenas um deles na requisição.
            if($cnpj === null && $remetente === null){
                throw new InvalidArgumentException('Um dos campos "remetente" ou "cnpj" deve ser informado.');
            }
            
            verificarCampoPreenchimentoObrigatorio($destinatario, "destinatario");
            
            $this->cnpj = $cnpj;
            $this->remetente = $remetente;
            $this->destinatario = $destinatario;
        }
    }

?>