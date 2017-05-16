<?php
namespace Application\Iss\Service;

use Application\Iss\Client\IssClientInterface;
use Application\GeoCode\Client\GeoCodeClientInterface;

class IssService
{
    const ISS_NAME = 'iss';
    const STATUS_OK = 'OK';

    private $issClient;
    private $geoCodeClient;
    
    public function __construct(IssClientInterface $issClient, GeoCodeClientInterface $geoCodeClient)
    {
        $this->issClient = $issClient;
        $this->geoCodeClient = $geoCodeClient;
    }
    
    public function getCurrentIssLocationName()
    {
        $satellites = $this->issClient->getSatellites();
        $issId = null;
        foreach ($satellites as $key => $value) {
            if ($value['name'] == self::ISS_NAME) {
                $issId = $value['id'];
            }
        }
        if (is_null($issId)) {
            throw new Exception("Couldn't find ISS in service", 10);
        }
        $satelliteInformation = $this->issClient->getSatelliteById($issId);
        
        $latlng = $satelliteInformation['latitude'] . ',' . $satelliteInformation['longitude'];
        
        $geoLocation = $this->geoCodeClient->getLocationByCoordinates($latlng);
        if ($geoLocation['status'] == self::STATUS_OK) {
            return $geoLocation['results'][0]['formatted_address'];
        } else {
            throw new \Exception("Nie można wskazać najbliższego miejsca adresowego według geocode. <br />"
                . "Stacja ISS znajduje się nad współrzędnymi $latlng - szerokości i długości geograficznej", 20);
        }
    }
}
