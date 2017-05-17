<?php
namespace Application\Iss\Client;

/**
 * Interface for ISS API which gives information about International Space Station
 */
interface IssClientInterface
{
    /**
     * Returns list of staellites
     */
    public function getSatellites();
    
    /**
     * Returns satellite information
     * 
     * @param int $id
     */
    public function getSatelliteById($id);
}

