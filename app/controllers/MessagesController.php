<?php

class MessagesController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
         $this->view->setVar("TopMenuSelected", 'messages');
    }
}