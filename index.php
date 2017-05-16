<?php
include dirname(realpath(__FILE__))	. "/Application/Autoloader.php";

use Application\Controller\SpaceStation;
use Application\Config\AppConfig;

include '/Application/View/header.php';
try {
    $appConfig = AppConfig::getConfig();
    $action = isset($_GET['action']) ? $_GET['action'] : $appConfig['defaultAction'];
    $actionController = new SpaceStation();
    if (method_exists($actionController, $action) && in_array($action, $appConfig['allowedActions'])) {
        $view = $actionController->{$action}();
        $view->render();
    } else {
        throw new Exception("Wrong action specified");
    }
} catch (Exception $e) {
    print_r($e->getMessage());
}
include '/Application/View/footer.php';
