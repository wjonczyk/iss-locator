<?php
namespace Application\GeoCode\Client;

interface GeoCodeClientInterface
{
    public function getLocationByCoordinates($latlng);
}