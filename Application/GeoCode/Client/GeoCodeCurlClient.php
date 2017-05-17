<?php
namespace Application\GeoCode\Client;

use Application\Lib\ApiCurlClient;

/**
 * Curl client used to connect to GeoCode API and retrieve location
 */
class GeoCodeCurlClient implements GeoCodeClientInterface
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
     * Returns array of locations from GeoCode API based on parameter
     * with latitude and longitude
     * 
     * @param string $latlng
     * @return array
     */
    public function getLocationByCoordinates($latlng)
    {
        $response = $this->curlClient->call($this->baseUrl . '/json?latlng=' . $latlng, []);
        return json_decode($response, true);
    }
}
