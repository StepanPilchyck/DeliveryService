<?php

class IndexController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        //$this->view->setVar("TopMenuSelected", 'work');
        $this->response->redirect('/search/full/package', '/');
    }
}