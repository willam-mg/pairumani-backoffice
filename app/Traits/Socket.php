<?php

namespace App\Traits;

trait Socket
{
    private $urlSocket = 'https://socket.pairumani.rnova-services.com/refresh';
    
    public function emmit() {
        $crl = curl_init();
        curl_setopt($crl, CURLOPT_URL, $this->urlSocket);
        curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($crl);
        curl_close($crl);
        return $response;
    }
}
