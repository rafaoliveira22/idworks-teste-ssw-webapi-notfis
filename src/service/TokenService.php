<?php
    class TokenService{
        private string $url = 'https://ssw.inf.br/api/generateToken';
        
        public function gerarToken(TokenRequest $tokenRequest): TokenResponse{
            $data = [
                'domain' => $tokenRequest->domain,
                'username' => $tokenRequest->username,
                'password' => $tokenRequest->password,
                'cnpj_edi' => $tokenRequest->cnpj_edi,
                'force' => $tokenRequest->force,
            ];
            $data = removerValoresNulos($data);

            $ch = curl_init($this->url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                throw new Exception('Erro de conexão com a API /generateToken: ' . curl_error($ch));
            }

            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $responseDecode = json_decode($response, true);
            if($httpCode === 200 || $httpCode === 400 || $httpCode === 401 || $httpCode === 500){
                return new TokenResponse(
                    $responseDecode['success'],
                    $responseDecode['date_time'],
                    $responseDecode['domain'],
                    $responseDecode['username'],
                    $responseDecode['token'],
                    $responseDecode['validity'],
                    $responseDecode['message'],
                );
            } elseif ($httpCode === 400 || $httpCode === 401 || $httpCode === 500) {
                throw new Exception("Erro na geração do token: {$responseDecode['message']}");
            } else {
                throw new Exception("Resposta inesperada: $responseDecode");
            }
        }
    }
?>