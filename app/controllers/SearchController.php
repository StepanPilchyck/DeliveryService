<?php

class SearchController extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        View::setJs($this);
        View::setCss($this);
        View::setMessages($this);
    }
    
    public function indexAction()
    {
        $this->view->disable();
        $this->response->redirect('/work', '/');
    }
    
    public function fullAction($reception = null)
    {
        $this->view->setVar("TopMenuSelected", 'work');
        $this->view->setVar("MenuSelected", 'search');
        $this->view->setVar("MenuItemActive", $reception);
        if(!empty($reception))
        {
            switch ($reception)
            {
                case 'package':
                    $this->view->setVar("StationsAll", Stations::getStations());
                    $this->view->setVar("PackageStatusAll", References::getPackageStatus());
                    $this->view->setVar("CountriesAll", References::getCountries());
                    $this->view->setVar("result_search", Package::getAll());
                    if($this->request->get('submit'))
                    {
                        $this->view->setVar("result_search", Package::findPackages(
                            $this->request->get(),
                            Users::getStationId($this)
                        ));
                        $this->view->setVar("post", $this->request->get());
                        $view = 'form_' . $reception;
                    }
                    else
                    {
                        $view = 'form_' . $reception;
                    }
                    
                    View::addJs($this, [
                        '/js/async/jquery.mb.browser.js',
                        '/js/async/jquery.mousewheel.js',
                        '/js/async/calendar_date-time.js'
                    ]);

                    View::addCss($this, [
                        '/css/calendar_date-time.css'
                    ]);
                    
                    break;
            }
        }
        
        $this->view->pick('/search/'. $view);
    }
}