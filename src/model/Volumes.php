<?php
    
    class Volumes{
        public string $codigo;
        public int $qtdeVol;
    
        public function __construct(string $codigo, int $qtdeVol){
            verificarCampoPreenchimentoObrigatorio($codigo, "codigo");
            verificarCampoPreenchimentoObrigatorio($qtdeVol, "qtdeVol");

            $this->codigo = $codigo;
            $this->qtdeVol = $qtdeVol;
        }
    }


?>