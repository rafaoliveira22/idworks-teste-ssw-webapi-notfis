<?php
    function verificarTamanhoString(string $texto, string $nomeCampo, int $tamanhoMaximo): void{
        $tamanho = strlen($texto);
        if ($tamanho > $tamanhoMaximo) {
            throw new InvalidArgumentException(
                "O campo '$nomeCampo' tem $tamanho caracteres. Tamanho máximo permitido: $tamanhoMaximo caracteres."
            );
        }
    }

    function verificarCampoPreenchimentoObrigatorio(mixed $valor, string $nomeCampo){
        if($valor === null) throw new InvalidArgumentException("O campo '$nomeCampo' não foi informado e requer preenchimento obrigatório");
    }

    function verificarAcentuacao(string $valor, string $nomeCampo){
        // Regra 3 do SSW Assinatura do Token WebAPI: Não enviar valores com acentuação.
        if (preg_match('/[áàãâäéèêëíìîïóòõôöúùûüçñÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÔÖÚÙÛÜÇÑ]/u', $valor)) throw new InvalidArgumentException("O campo '$nomeCampo' contém caracteres acentuados, o que não é permitido.");
    }
?>