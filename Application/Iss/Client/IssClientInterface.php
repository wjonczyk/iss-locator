<?php
namespace Application\Iss\Client;

interface IssClientInterface
{
    public function getSatellites();
    
    public function getSatelliteById($id);
}

