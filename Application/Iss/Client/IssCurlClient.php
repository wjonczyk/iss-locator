<?php
namespace Application\Iss\Client;

use Application\Lib\ApiCurlClient;

/**
 * Curl client used to connect to ISS API and retrieve Space Station information
 */
class IssCurlClient implements IssClientInterface
{   
    /**
     *
     * @var ApiCurlClient
     */
    private $curlClient;
    
    /**
     *
     * @var string
     */
    private $baseUrl;
    
    /**
     * 
     * @param ApiCurlClient $client
     * @param string $baseUrl
     */
    public function __construct(ApiCurlClient $client, $baseUrl)
    {
        $this->curlClient = $client;
        $this->baseUrl = $baseUrl;
    }

    /**
     * Return array of satellites with pair of name and id
     * Currently only one Space Station exists
     * 
     * @return array
     */
    public function getSatellites()
    {
        $response = $this->curlClient->call($this->baseUrl, []);
        return json_decode($response, true);
    }
    
    /**
     * Returns information about Space Station like speed, position etc.
     * 
     * @param int $id
     * @return array
     */
    public function getSatelliteById($id)
    {
        $response = $this->curlClient->call($this->baseUrl . '/' . $id, []);
        return json_decode($response, true);
    }
}

