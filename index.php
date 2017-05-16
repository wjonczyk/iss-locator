<?php

include dirname(realpath(__FILE__))	. "/Application/Autoloader.php";

use Application\Controller\SpaceStation;

use Application\Config\AppConfig;
//use Application\Iss\Client\IssCurlClient;
//use Application\GeoCode\Client\GeoCodeCurlClient;
//use Application\Lib\ApiCurlClient;
//use Application\Iss\Service\IssService;

include '/Application/View/header.php';
try {
    $appConfig = AppConfig::getConfig();
    $action = isset($_GET['action']) ? $_GET['action'] : $appConfig['defaultAction'];
    $actionController = new SpaceStation();
    if (method_exists($actionController, $action) && in_array($action, $appConfig['allowedActions'])) {
        $view = $actionController->{$action}();
//        echo '<pre>';
//        var_dump($view);
//        echo '</pre>';
//        exit();
        $view->render();
    } else {
        throw new Exception("No action to run");
    }
//
//    $issClient = new IssCurlClient(new ApiCurlClient(), $appConfig['iss']['api_url']);
//    $geoCodeClient = new GeoCodeCurlClient(new ApiCurlClient(), $appConfig['geocode']['api_url']);
//
//    $issService = new IssService($issClient, $geoCodeClient);
//
//    $locationName = $issService->getCurrentIssLocationName(); //string
//    echo "Stacja ISS aktualnie znajduje się nad: " . $locationName;//to echo bedzie w presenterze
} catch (Exception $e) {
    print_r($e->getMessage());
}
include '/Application/View/footer.php';
