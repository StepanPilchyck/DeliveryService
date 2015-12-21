<?php

class AuthController extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        $this->view->setVar('js', [
            'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
            '/js/object.js'
        ]);
        
        $this->view->setVar('css', [
            '/css/fonts.css',
            '/css/bootstrap.css',
            '/css/style.css'
        ]);
        
        $this->view->setVar('messages', []);
    }
    
    public function indexAction()
    {
        $this->response->redirect('/auth/login', '/');
    }
    
    private function _registerSession($user_id)
    {
        $user = Users::getUsers($user_id);
        
        $this->session->set('user', array(
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name']
        ));
        
        $this->session->set('auth', array(
            'id' => $user_id,
            'station_id' => $user['station_id']
        ));
    }
    
    public function loginAction()
    {
        if ($this->request->isPost()) {
            
            $messages = array();
            
            $email = $this->request->getPost('user_email','email');
            $password = $this->request->getPost('user_password');

            //Find for the user in the database
            $user_id = Users::Login($email, $password);
            if($user_id == -1)
            {
                $messages[] = array(
                    'class' => 'alert-danger',
                    'text' => "<p><b>Пользователь не найден.</b> Проверьте правильность введенных данных.</p>"
                );
            }
            if($user_id == -2)
            {
                $messages[] = array(
                    'class' => 'alert-danger',
                    'text' => "<p><b>Пользователь $email удалён.</b> Обратитесь к администратору или менеджеру.</p>"
                );
            }
            if($user_id == -3)
            {
                $messages[] = array(
                    'class' => 'alert-danger',
                    'text' => "<p><b>Пользователь $email заблокирован.</b> Обратитесь к администратору или менеджеру.</p>"
                );
            }
            if ($user_id > -1)
            {
                $this->_registerSession($user_id);
                $this->response->redirect('/', '/');
            }
            
            $this->view->setVar("messages", $messages);
        }
    }
    
    public function logoutAction()
    {
        $this->view->disable();
        $this->session->destroy();
        $this->response->redirect('/', '/');
    }
}