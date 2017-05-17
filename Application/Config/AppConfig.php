<?php
namespace Application\Config;

class AppConfig
{
    protected static $basePath;
    
    public static function getConfig()
    {
        return [
            'iss' => [
                'api_url' => 'https://api.wheretheiss.at/v1/satellites'
            ],
            'geocode' => [
                'api_url' => 'https://maps.googleapis.com/maps/api/geocode'
            ],
            'defaultAction' => 'showAction',
            'allowedActions' => [
                'showAction'
            ]
        ];
    }
    
    public static function setBasePath($basePath)
    {
        static::$basePath = $basePath;
    }
    
    public static function getBasePath()
    {
        return static::$basePath;
    }
}
