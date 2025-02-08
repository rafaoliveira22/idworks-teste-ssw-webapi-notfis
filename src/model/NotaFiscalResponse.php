<?php
    
    class NotaFiscalResponse{
        public bool $sucesso;
        public string $mensagem;
        public string $remetente;
        public string $destinatario;
        public string $notaFiscal;
        public string $pedido;
        public string $protocolo;
    
        public function __construct(
            bool $sucesso,
            string $mensagem,
            string $remetente,
            string $destinatario,
            string $notaFiscal,
            string $pedido,
            string $protocolo
        ){
            $this->sucesso = $sucesso;
            $this->mensagem = $mensagem;
            $this->remetente = $remetente;
            $this->destinatario = $destinatario;
            $this->notaFiscal = $notaFiscal;
            $this->pedido = $pedido;
            $this->protocolo = $protocolo;
        }
    }


?>