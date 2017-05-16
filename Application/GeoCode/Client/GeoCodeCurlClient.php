<?php
namespace Application\GeoCode\Client;

use Application\Lib\ApiCurlClient;

class GeoCodeCurlClient implements GeoCodeClientInterface
{
    private $curlClient;
    private $baseUrl;
    
    public function __construct(ApiCurlClient $client, $baseUrl)
    {
        $this->curlClient = $client;
        $this->baseUrl = $baseUrl;
    }
    
    public function getLocationByCoordinates($latlng)
    {
        $response = $this->curlClient->call($this->baseUrl . '/json?latlng=' . $latlng, []);
        return json_decode($response, true);
    }
}
