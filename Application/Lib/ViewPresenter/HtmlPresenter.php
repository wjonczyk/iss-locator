<?php
namespace Application\Lib\ViewPresenter;

use Application\Lib\ViewPresenter\ViewPresenterInterface;

class HtmlPresenter implements ViewPresenterInterface
{
    public $template;
    public $value;
    
    public function __construct($template)
    {
        $this->template = $template;
    }
    
    public function render()
    {
        if (!file_exists($this->template)) {
            throw new \Exception("No template set in Controller");
        }
        include $this->template;
    }
    
    public function addValue($value)
    {
        $this->value = $value;
    }
}