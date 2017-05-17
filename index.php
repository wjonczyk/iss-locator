<?php
date_default_timezone_set('Europe/Warsaw');
include dirname(realpath(__FILE__))	. "/Application/Autoloader.php";

use Application\Controller\SpaceStationController;
use Application\Config\AppConfig;
use Application\Iss\Client\IssCurlClient;
use Application\GeoCode\Client\GeoCodeCurlClient;
use Application\Lib\ApiCurlClient;
use Application\Iss\Service\IssService;
use Application\Lib\ViewRenderer\HtmlRenderer;

/**
 * This is the main Controller dispatching request
 * Based on action it loads required clients and instantiates IssService
 * for the action Controller. Action is requested and if no errors occur 
 * result is rendered
 */
try {
    $appConfig = AppConfig::getConfig();
    $action = isset($_GET['action']) ? $_GET['action'] : $appConfig['defaultAction'];
    if (!in_array($action, $appConfig['allowedActions'])) {
        throw new \Exception("Wrong action specified");
    }
    $issClient = new IssCurlClient(new ApiCurlClient(), $appConfig['iss']['api_url']);
    $geoCodeClient = new GeoCodeCurlClient(new ApiCurlClient(), $appConfig['geocode']['api_url']);
    $renderer = new HtmlRenderer(dirname(realpath(__FILE__)));
    $issService = new IssService($issClient, $geoCodeClient);
    $actionController = new SpaceStationController($issService, $renderer);
    $actionController->{$action.'Action'}();
} catch (\Exception $e) {
    $errorRenderer = new HtmlRenderer(dirname(realpath(__FILE__)));
    $errorRenderer->render('/Application/View/error.php');
}
