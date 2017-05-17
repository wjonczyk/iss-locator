<?php
namespace Application\Lib;

/**
 * Basic client used to connect with APIs using curl.
 * Can be further expanded with funcionality 
 * 
 */
class ApiCurlClient
{
    /**
     *
     * @var string
     */
    public $response;
    
    /**
     *
     * @var int
     */
    public $status;
    
    /**
     *
     * @var string
     */
    public $error;
    
    /**
     * Method initializng connection with requested location using curl.
     * Accepts array of options for connection, tries to execute request
     * and if succesfull returns response.
     * 
     * @param string $url
     * @param array $options
     * @return string
     */
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

