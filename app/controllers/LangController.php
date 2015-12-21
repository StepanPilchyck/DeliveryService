<?php

class LangController extends \Phalcon\Mvc\Controller{
    public function indexAction()
    {
        $this->view->disable();
        $lang = $this->request->getPost("lang_select");
        $this->cookies->set('lang', $lang, time() + 15 * 86400);
        $this->response->redirect('/', '/');
    }
}
