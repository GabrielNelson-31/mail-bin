<?php

namespace MF\Controller;

abstract class Action  
{
    protected $view;
    public function __construct()
    {
        $this->view = new \stdClass();
    }
    protected function render($view, $layout='layout')
    {
        $this->view->page = $view;
        if (file_exists('../App/Views/'.$layout.'.phtml')) {
            require_once '../App/Views/'.$layout.'.phtml';
        }

        $this->content();
    }
    protected function content()
    {
        $classActual = get_class($this);
        $classActual = str_replace('App\\Controllers\\','', $classActual);
        $classActual = strtolower(str_replace('Controller','',$classActual));

        require_once "../App/views/".$classActual."/".$this->view->page.".phtml";
    }
}


?>