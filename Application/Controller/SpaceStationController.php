<?php
namespace Application\Controller;

class SpaceStationController
{
    public $service;
    public $renderer;
    
    public function __construct($service, $renderer)
    {
        $this->service = $service;
        $this->renderer = $renderer;
    }
    
    public function showAction()
    {
        $locationName = $this->service->getCurrentIssLocation();
        $this->renderer->addValue('location', $locationName);
        $this->renderer->render('/Application/View/show.php');
    }
}
