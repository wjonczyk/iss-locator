<?php
namespace Application\Iss\Service;

use Application\Iss\Client\IssClientInterface;
use Application\GeoCode\Client\GeoCodeClientInterface;
use Application\Iss\IssLocation;

/**
 * Service for retrieving Space Station location using APIs
 */
class IssService
{
    /**
     * @var string
     */
    const ISS_NAME = 'iss';

    /**
     *
     * @var IssClientInterface 
     */
    private $issClient;
    
    /**
     *
     * @var GeoCodeClientInterface 
     */
    private $geoCodeClient;
    
    /**
     * 
     * @param IssClientInterface $issClient
     * @param GeoCodeClientInterface $geoCodeClient
     */
    public function __construct(IssClientInterface $issClient, GeoCodeClientInterface $geoCodeClient)
    {
        $this->issClient = $issClient;
        $this->geoCodeClient = $geoCodeClient;
    }
    
    /**
     * Main method to retrieve Space Stataion coordinates from ISS API
     * and based on them get human readable location information 
     * from GeoCode API
     * 
     * @return IssLocation
     * @throws \Exception
     */
    public function getCurrentIssLocation()
    {
        $satellites = $this->issClient->getSatellites();
        $issId = null;
        foreach ($satellites as $key => $value) {
            if ($value['name'] == self::ISS_NAME) {
                $issId = $value['id'];
            }
        }
        if (is_null($issId)) {
            throw new \Exception("Couldn't find ISS in service", 10);
        }
        $satelliteInformation = $this->issClient->getSatelliteById($issId);
        
        $latlng = $satelliteInformation['latitude'] . ',' . $satelliteInformation['longitude'];
        
        /*
         * Here can be added some caching mechanism to check if we already
         *  have name of the location for specific $latlng value
         */
        
        $geoLocation = $this->geoCodeClient->getLocationByCoordinates($latlng);
        $issLocation = new IssLocation();
        $issLocation->setStatus($geoLocation['status']);
        $issLocation->setLatlng($latlng);
        if ($issLocation->isStatusOk() && !empty($geoLocation['results'])) {
            $issLocation->setName($geoLocation['results'][0]['formatted_address']);
        }
        return $issLocation;
    }
}
