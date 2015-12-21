<?php

class AjaxController extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        $this->view->disable();
    }
    
    public function indexAction()
    {
        
    }
    
    public function personAction($case)
    {
        echo('!!!');
    }
}