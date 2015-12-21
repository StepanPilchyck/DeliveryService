<?php

ini_set('error_reporting', E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

date_default_timezone_set('Europe/Kiev');

try {
    $config = new Phalcon\Config\Adapter\Ini('../config/app.ini');
    
    $loader = new \Phalcon\Loader();
    
    $loader->registerDirs(
        array(
            $config->application->controllersDir,
            $config->application->pluginsDir,
            $config->application->libraryDir,
            $config->application->modelsDir,
        )
    )->register();

    //Create a DI 
    $di = new Phalcon\DI\FactoryDefault();
    
    //Set XML Views Config
    $di->set('func_view', function() use ($config){
        return array("config" => $config->func_views->path,
                     "dir" => $config->func_views->dir
        );
    });
    $di->set('main_menu_items', function() use ($config){
        return array("config" => $config->main_menu_items->path,
                     "dir" => $config->main_menu_items->dir
        );
    });
    
    $di->set('action_menu_items', function() use ($config){
        return array("config" => $config->action_menu_items->path,
                     "dir" => $config->action_menu_items->dir
        );
    });
    
    $di->set('resource_strings', function() use ($config){
        return array("config" => $config->resource_strings->path
        );
    });
    
    $di->set('faker', function() use ($config){
        return array("config" => $config->faker->path
        );
    });
    
    $di->set('lang', function() use ($config){
        return array("default_lang" => $config->lang->default
        );
    });
    
    $di->set('cookies', function() {
        $cookies = new Phalcon\Http\Response\Cookies();
        $cookies->useEncryption(false);
        return $cookies;
    });
    
    $di->set('crypt', function() {
        $crypt = new Phalcon\Crypt();
        $crypt->setKey('secret'); //Use your own key!
        return $crypt;
    });
    
    //Connect from DB 
    $di->set('db', function() use ($config) {
    return new \Phalcon\Db\Adapter\Pdo\Postgresql(array(
        "host" => $config->database->host,
        "username" => $config->database->username,
        "password" => $config->database->password,
        "dbname" => $config->database->name
        ));
    });
    
    $di->set('session', function() {
        $session = new Phalcon\Session\Adapter\Files();
        $session->start();
        return $session;
    });
    
    $di->set('dispatcher', function() use ($di) {

        $eventsManager = $di->getShared('eventsManager');

        $security = new Security($di);

        $eventsManager->attach('dispatch', $security);

        $dispatcher = new Phalcon\Mvc\Dispatcher();

        $dispatcher->setEventsManager($eventsManager);

        return $dispatcher;
    });
    
    $di->set('view', function()
    {
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('../app/views/');
        
        $view->registerEngines(array(
            //".volt" => 'Phalcon\Mvc\View\Engine\Volt' //default setting
            //
            //Development Option
            ".volt" => function($view, $id)
            {
                $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $id);
                $volt->setOptions(array(
                    'compileAlways' => true
                ));
                return $volt;
            }
        )); 
        return $view;
    });
    
    $application = new \Phalcon\Mvc\Application($di);
    
    
    
    echo $application->handle()->getContent();
} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}