<?php
namespace Application\Controller;

use Application\Config\AppConfig;
use Application\Iss\Client\IssCurlClient;
use Application\GeoCode\Client\GeoCodeCurlClient;
use Application\Lib\ApiCurlClient;
use Application\Iss\Service\IssService;
use Application\Lib\ViewPresenter\HtmlPresenter;

class SpaceStation
{
    public function show()
    {
//        if (isset($_GET['format'])) {
//            
//        }
        $appConfig = AppConfig::getConfig();
        $issClient = new IssCurlClient(new ApiCurlClient(), $appConfig['iss']['api_url']);
        $geoCodeClient = new GeoCodeCurlClient(new ApiCurlClient(), $appConfig['geocode']['api_url']);

        $issService = new IssService($issClient, $geoCodeClient);

        $locationName = $issService->getCurrentIssLocationName();
        $presenter = new HtmlPresenter(__DIR__ . "\..\View\show.php");
        $presenter->addValue($locationName);
        return $presenter;
    }
}
