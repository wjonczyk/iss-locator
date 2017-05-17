<?php
namespace Application\Lib\ViewRenderer;

use Application\Lib\ViewRenderer\ViewRendererInterface;

class HtmlRenderer implements ViewRendererInterface
{
    public $basePath;
    public $value;
    
    public function __construct($basePath)
    {
        $this->basePath = $basePath;
    }
    
    public function render($location)
    {
        if (!file_exists($this->basePath . $location)) {
            throw new \Exception("No template set in Controller");
        }
        include $this->basePath . $location;
    }
    
    public function addValue($key, $value)
    {
        $this->value[$key] = $value;
    }
}