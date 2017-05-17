<?php
namespace Application\Controller;

/**
 * action Controller for displaying Space Station location info
 * 
 */
class SpaceStationController
{
    /**
     *
     * @var IssService
     */
    public $service;
    
    /**
     *
     * @var HtmlRenderer 
     */
    public $renderer;
    
    /**
     * 
     * @param IssService $service
     * @param HtmlRenderer $renderer
     */
    public function __construct($service, $renderer)
    {
        $this->service = $service;
        $this->renderer = $renderer;
    }
    
    /**
     * Display Space Station location based on geocode API
     * @return void
     */
    public function showAction()
    {
        $locationName = $this->service->getCurrentIssLocation();
        $this->renderer->addValue('location', $locationName);
        $this->renderer->render('/Application/View/show.php');
    }
}
