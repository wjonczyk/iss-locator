<?php
namespace Application\Lib\ViewRenderer;

use Application\Lib\ViewRenderer\ViewRendererInterface;

/**
 * 
 */
class HtmlRenderer implements ViewRendererInterface
{
    /**
     * Base dirpath to DOCUMENT ROOT
     *
     * @var string
     */
    public $basePath;
    
    /**
     * Array containing parameters to use in views
     *
     * @var array
     */
    public $value;
    
    /**
     * 
     * @param string $basePath
     */
    public function __construct($basePath)
    {
        $this->basePath = $basePath;
    }
    
    /**
     * Renderer method checking for requested view template and including
     * this view if found
     * 
     * @param string $location
     * @throws \Exception
     */
    public function render($location)
    {
        if (!file_exists($this->basePath . $location)) {
            throw new \Exception("No template set in Controller");
        }
        include $this->basePath . $location;
    }
    
    /**
     * Method to add parameters to be used in views.
     * Accepts varius types in $value
     * 
     * @param string $key
     * @param mixed $value
     */
    public function addValue($key, $value)
    {
        $this->value[$key] = $value;
    }
}