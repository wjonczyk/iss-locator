<?php
include dirname(realpath(__FILE__))	. "/Application/Autoloader.php";

use Application\Controller\SpaceStationController;
use Application\Config\AppConfig;
use Application\Iss\Client\IssCurlClient;
use Application\GeoCode\Client\GeoCodeCurlClient;
use Application\Lib\ApiCurlClient;
use Application\Iss\Service\IssService;
use Application\Lib\ViewRenderer\HtmlRenderer;


try {
    AppConfig::setBasePath(dirname(realpath(__FILE__)));
    $appConfig = AppConfig::getConfig();
    $action = isset($_GET['action']) ? $_GET['action'] : $appConfig['defaultAction'];
    $issClient = new IssCurlClient(new ApiCurlClient(), $appConfig['iss']['api_url']);
    $geoCodeClient = new GeoCodeCurlClient(new ApiCurlClient(), $appConfig['geocode']['api_url']);
    $renderer = new HtmlRenderer();
    $issService = new IssService($issClient, $geoCodeClient);
    $actionController = new SpaceStationController($issService, $renderer);
    if (method_exists($actionController, $action) && in_array($action, $appConfig['allowedActions'])) {
        $actionController->{$action}();
    } else {
        throw new \Exception("Wrong action specified");
    }
} catch (\Exception $e) {
    $errorRenderer = new HtmlRenderer();
    $errorRenderer->render(AppConfig::getBasePath(). '/Application/View/errorAction.php');
}
