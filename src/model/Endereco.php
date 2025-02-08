<?php
    require_once 'src/Utils.php';

    class Endereco{
        public string $rua;
        public string $numero;
        public ?string $complemento;
        public string $bairro;
        public string $cidade;
        public string $uf;
        public string $cep;

        public function __construct(
            string $rua,
            string $numero,
            ?string $complemento = null,
            string $bairro,
            string $cidade,
            string $uf,
            string $cep
        ) {
            verificarCampoPreenchimentoObrigatorio($rua, "rua");
            verificarCampoPreenchimentoObrigatorio($numero, "numero");
            verificarCampoPreenchimentoObrigatorio($bairro, "bairro");
            verificarCampoPreenchimentoObrigatorio($cidade, "cidade");
            verificarCampoPreenchimentoObrigatorio($uf, "uf");
            verificarCampoPreenchimentoObrigatorio($cep, "cep");

            verificarTamanhoString($rua, "rua", 50);
            verificarTamanhoString($numero, "numero", 50);
            if($complemento !== null) verificarTamanhoString($complemento, "complemento", 30);
            verificarTamanhoString($bairro, "bairro", 10);

            $this->rua = $rua;
            $this->numero = $numero;
            $this->complemento = $complemento;
            $this->bairro = $bairro;
            $this->cidade = $cidade;
            $this->uf = $uf;
            $this->cep = $cep;
        }
    }
?>