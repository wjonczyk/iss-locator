<?php
namespace Application\Config;

class AppConfig
{    
    public static function getConfig()
    {
        return [
            'iss' => [
                'api_url' => 'https://api.wheretheiss.at/v1/satellites'
            ],
            'geocode' => [
                'api_url' => 'https://maps.googleapis.com/maps/api/geocode'
            ],
            'defaultAction' => 'show',
            'allowedActions' => [
                'show'
            ]
        ];
    }
}
