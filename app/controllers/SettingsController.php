<?php

class SettingsController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
         $this->view->setVar("TopMenuSelected", 'settings');
    }
}