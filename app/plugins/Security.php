<?php

use Phalcon\Events\Event,
    Phalcon\Mvc\Dispatcher,
    Phalcon\Mvc\User\Plugin;

class Security extends Plugin
{
   public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
   {
        $auth = $this->session->get('auth');
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();
        
        if (!$auth)
        {
            if($controller != 'auth' && $action != 'login')
            {
                $dispatcher->forward(
                   array(
                       'controller' => 'auth',
                       'action' => 'login'
                   )
                );
                $this->flash->error($controller);
                $this->flash->error($action);
                return false;
            }
        }
    }
}