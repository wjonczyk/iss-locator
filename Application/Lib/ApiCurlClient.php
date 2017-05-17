<?php
namespace Application\Lib;

class ApiCurlClient
{
    public $response;
    public $status;
    public $error;
    
    public function call($url, array $options)
    {
        $session = curl_init();

        curl_setopt($session, CURLOPT_URL, $url);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        if (!empty($options)) {
            curl_setopt_array($session, $options);
        }
        $this->response = curl_exec($session);
        $this->status = curl_getinfo($session, CURLINFO_HTTP_CODE);
        if (curl_errno($session)) {
            $this->error = curl_error($session);
        }
        curl_close($session);
        return $this->response;
    }
}

