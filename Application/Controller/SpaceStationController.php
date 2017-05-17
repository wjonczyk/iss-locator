<?php
namespace Application\Controller;

use Application\Iss\Service\IssService;
use Application\Lib\ViewRenderer\ViewRendererInterface;

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
    private $service;
    
    /**
     *
     * @var ViewRendererInterface 
     */
    private $renderer;
    
    /**
     * 
     * @param IssService $service
     * @param ViewRendererInterface $renderer
     */
    public function __construct(IssService $service, ViewRendererInterface $renderer)
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
