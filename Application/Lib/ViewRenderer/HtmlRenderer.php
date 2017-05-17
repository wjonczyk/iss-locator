<?php
namespace Application\Lib\ViewRenderer;

use Application\Lib\ViewRenderer\ViewRendererInterface;

class HtmlRenderer implements ViewRendererInterface
{
    public $value;
    
    public function render($location)
    {
        if (!file_exists($location)) {
            throw new \Exception("No template set in Controller");
        }
        include $location;
    }
    
    public function addValue($key, $value)
    {
        $this->value[$key] = $value;
    }
}