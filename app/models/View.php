<?php

class View extends \Phalcon\Mvc\Model 
{
    public static function setJs($t)
    {
        $t->view->setVar('js', [
            '/js/async/jquery-1_11_2.min.js',
            '/js/async/bootstrap.js',
            '/js/object.js'
        ]);
    }
    
    public static function addJs($t, $files)
    {
        $t->view->setVar('js', array_merge($t->view->getVar('js'), $files));
    }
    
    public static function setCss($t)
    {
        $t->view->setVar('css', [
            '/css/fonts.css',
            '/css/bootstrap.css',
            '/css/style.css'
        ]);
    }
    
    public static function addCss($t, $files)
    {
        $t->view->setVar('css', array_merge($t->view->getVar('css'), $files));
    }
    
    public static function setMessages($t)
    {
        $t->view->setVar('messages', []);
    }
    
    public static function addMessages($t, $message)
    {
        $t->view->setVar('messages', array_merge($t->view->getVar('messages'), $message));
    }
}