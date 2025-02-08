<?php
    class TokenResponse{
        public bool $sucess;
        public string $date_time;
        public ?string $domain;
        public ?string $username;
        public string $token;
        public ?string $validity;
        public string $message;
        
        public function __construct(
            bool $sucess,
            string $date_time,
            string $domain = null,
            string $username = null,
            string $token,
            string $validity = null,
            string $message,
        ){
            $this->sucess = $sucess;
            $this->date_time = $date_time;
            $this->domain = $domain;
            $this->username = $username;
            $this->token = $token;
            $this->validity = $validity;
            $this->message = $message;
        }
    }

?>