<?php    
    class TokenRequest{
        public string $domain;
        public string $username;
        public string $password;
        public string $cnpj_edi;
        public ?bool $force;

        public function __construct(
            string $domain,
            string $username,
            string $password,
            string $cnpj_edi,
            ?bool $force = null
        ){
            $this->domain = $domain;   
            $this->username = $username;   
            $this->password = $password;   
            $this->cnpj_edi = $cnpj_edi;   
            $this->force = $force;   
        }
    }
?>