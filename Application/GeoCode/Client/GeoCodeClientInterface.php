<?php
namespace Application\GeoCode\Client;

/**
 * Interface for GeoCode API
 */
interface GeoCodeClientInterface
{
    /**
     * Returns location based on parameter with latitude and longitude
     * @param string $latlng
     */
    public function getLocationByCoordinates($latlng);
}