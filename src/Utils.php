<?php
    function verificarTamanhoString(string $texto, string $nomeCampo, int $tamanhoMaximo): void{
        $tamanho = strlen($texto);
        if ($tamanho > $tamanhoMaximo) {
            throw new InvalidArgumentException(
                "O campo '$nomeCampo' tem $tamanho caracteres. Tamanho máximo permitido: $tamanhoMaximo caracteres."
            );
        }
    }

    function verificarCampoPreenchimentoObrigatorio(mixed $campo, string $nomeCampo){
        if($campo === null) throw new InvalidArgumentException("O campo '$nomeCampo' não foi informado e requer preenchimento obrigatório");
    }

    function removerValoresNulos(array $data): array {
        return array_filter($data, function ($value) {
            if (is_array($value)) {
                $value = $this-> removerValoresNulos($value); // Chamada recursiva para arrays aninhados
            }
            return $value !== null;
        });
    }
?>