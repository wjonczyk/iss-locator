<?php
namespace Application\Lib\ViewRenderer;

/**
 * Interface for View renderers
 */
interface ViewRendererInterface
{
    /**
     * Display requested view
     * 
     * @param string $location
     */
    public function render($location);
}
