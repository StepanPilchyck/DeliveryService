<?php

class WorkController extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        View::setJs($this);
        View::setCss($this);
        View::setMessages($this);
    }
    
    public function indexAction()
    {
        $this->view->setVar("TopMenuSelected", 'work');
    }
}