<?php

class AdministrationController extends \Phalcon\Mvc\Controller
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
    
    public function roleAction($reception = null, $item_id = null)
    {
        $this->view->setVar("TopMenuSelected", 'work');
        $this->view->setVar("MenuSelected", 'role');
        $this->view->setVar("MenuItemActive", $reception);
        
        $messages = array();
        
        if(!empty($reception))
        {
            $view = $reception;
            switch ($reception)
            {
                case 'add':
                    
                    break;
                    
                case 'preview':
                    if($this->request->isPost())
                    {
                        if((bool)$this->request->getPost('add'))
                        {
                            View::addMessages($this, [Roles::addRole($this->request->getPost())]);
                        }
                        if((bool)$this->request->getPost('delete'))
                        {
                            View::addMessages($this, [Roles::deleteRole($this->request->getPost('id'))]);
                        }
                    }
                    $this->view->setVar("RolesAll", Roles::getRoles());
                    break;
                
                case 'edit':
                    if(empty($item_id))
                    {
                        if($this->request->isPost())
                        {
                            $this->response->redirect('/administration/role/edit/' . $this->request->getPost('role_id'), '/');
                        }
                        View::addMessages($this, [array(
                            'class' => 'alert-info',
                            'text' => "<p>Выберите из выпадающего списка роль, которую нужно изменить.</p>"
                        )]);
                        $this->view->setVar("RolesAll", Roles::getRoles());
                    }
                    else
                    {
                        if($this->request->isPost())
                        {
                            View::addMessages($this, [Roles::setRoles($this->request->getPost())]);
                        }
                        $this->view->setVar("RoleRites", Roles::getRoles($item_id));
                    }
                    break;
                
            }
            $this->view->pick('/administration/'. "role_" . $view);
        }
    }
    
    public function referenceAction($reception = null)
    {
        $this->view->setVar("TopMenuSelected", 'work');
        $this->view->setVar("MenuSelected", 'reference');
        $this->view->setVar("MenuItemActive", $reception);
        $this->view->setVar("reference", 'countries');
        
        View::addMessages($this, [array(
            'class' => 'alert-info',
            'text' => "<p>Возможность изменять (добовлять, редактировать, удалять) информацию \"справочных таблиц\" базы данных. Эта информация используется в выподающих списках (ед. измерения, валюта, страны и т.д. ) для согласованной работы системы, так называемая низкоуровневая информация.</p>"
        )]);
        
        if($this->request->isPost())
        {
            $post = $this->request->getPost();
            switch ($post['reference'])
            {
                case 'countries':
                    if((bool)$post['add'])
                    {
                        View::addMessages($this, [References::addCountries($post['add'])]);
                    }
                    if((bool)$post['edit'])
                    {
                        View::addMessages($this, [References::setCountries($post['edit'])]);
                    }
                    if((bool)$post['delete'])
                    {
                        View::addMessages($this, [References::deleteCountry($post['id'])]);
                    }
                    break;
                    
                case 'currency':
                    if((bool)$post['add']['name'] && (bool)$post['add']['short_name'])
                    {
                        View::addMessages($this, [References::addCurrency($post['add']['name'], $post['add']['short_name'])]);
                    }
                    if((bool)$post['edit'])
                    {
                        View::addMessages($this, [References::setCurrency($post['edit'])]);
                    }
                    if((bool)$post['delete'])
                    {
                        View::addMessages($this, [References::deleteCurrency($post['id'])]);
                    }
                    break;
                    
                case 'units':
                    if((bool)$post['add']['name'] && (bool)$post['add']['short_name'] && (bool)$post['add']['type_id'])
                    {
                        View::addMessages($this, [References::addUnits($post['add']['name'], $post['add']['short_name'], $post['add']['type_id'])]);
                    }
                    if((bool)$post['edit'])
                    {
                        View::addMessages($this, [References::setUnits($post['edit'])]);
                    }
                    if((bool)$post['delete'])
                    {
                        View::addMessages($this, [References::deleteUnits($post['id'])]);
                    }
                    break;
                    
                case 'languages':
                    if((bool)$post['add']['name'] && (bool)$post['add']['short_name'])
                    {
                        View::addMessages($this, [References::addLanguages($post['add']['name'], $post['add']['short_name'])]);
                    }
                    if((bool)$post['edit'])
                    {
                        View::addMessages($this, [References::setLanguages($post['edit'])]);
                    }
                    if((bool)$post['delete'])
                    {
                        View::addMessages($this, [References::deleteLanguages($post['id'])]);
                    }
                    break;
                    
                case 'packages_status':
                    if((bool)$post['add']['name'] && (bool)$post['add']['description'])
                    {
                        View::addMessages($this, [References::addPackageStatus($post['add']['name'], $post['add']['description'])]);
                    }
                    if((bool)$post['edit'])
                    {
                        View::addMessages($this, [References::setPackageStatus($post['edit'])]);
                    }
                    if((bool)$post['delete'])
                    {
                        View::addMessages($this, [References::deletePackageStatus($post['id'])]);
                    }
                    break;
                    
                case 'stations_status':
                    if((bool)$post['add']['name'] && (bool)$post['add']['description'])
                    {
                        View::addMessages($this, [References::addStationsStatus($post['add']['name'], $post['add']['description'])]);
                    }
                    if((bool)$post['edit'])
                    {
                        View::addMessages($this, [References::setStationsStatus($post['edit'])]);
                    }
                    if((bool)$post['delete'])
                    {
                        View::addMessages($this, [References::deleteStationsStatus($post['id'])]);
                    }
                    break;
            }
            $this->view->setVar("reference", $post['reference']);
        }
        
        $this->view->setVar("CountriesAll", References::getCountries());
        $this->view->setVar("CurrencyAll", References::getCurrency());
        $this->view->setVar("UnitsAll", References::getUnits());
        $this->view->setVar("LanguagesAll", References::getLanguages());
        $this->view->setVar("PackageStatusAll", References::getPackageStatus());
        $this->view->setVar("StationsStatusAll", References::getStationsStatus());
        $this->view->pick('/administration/reference_edit');
    }
    
    public function stationAction($reception = null, $item_id = null)
    {
        $this->view->setVar("TopMenuSelected", 'work');
        $this->view->setVar("MenuSelected", 'stations');
        $this->view->setVar("MenuItemActive", $reception);
        
        $messages = array();
        
        if(!empty($reception))
        {
            $view = $reception;
            switch ($reception)
            {
                case 'add':
                    $this->view->setVar("CountriesAll", References::getCountries());
                    $this->view->setVar("StationsStatusAll", References::getStationsStatus());
                    $this->view->setVar("Stations", Stations::getStations());
                    break;
                    
                case 'preview':
                    if($this->request->isPost())
                    {
                        if((bool)$this->request->getPost('add'))
                        {
                            View::addMessages($this, [Stations::addStation($this->request->getPost())]);
                        }
                        if((bool)$this->request->getPost('delete'))
                        {
                            View::addMessages($this, [Stations::deleteStation($this->request->getPost('id'))]);
                        }
                    }
                    $this->view->setVar("StationsAll", Stations::getStations());
                    break;
                
                case 'edit':
                    if(empty($item_id))
                    {
                        if($this->request->isPost())
                        {
                            $this->response->redirect('/administration/station/edit/' . $this->request->getPost('station_id'), '/');
                        }
                        $messages[] = array(
                            'class' => 'alert-info',
                            'text' => "<p><b>Выберите</b> из выпадающего списка <b>станцию</b>, которую нужно изменить.</p>"
                        );
                        $this->view->setVar("StationsAll", Stations::getStations());
                    }
                    else
                    {
                        if($this->request->isPost())
                        {
                            $messages[] = Stations::setStation($this->request->getPost());
                        }
                        $this->view->setVar("Station", Stations::getStations($item_id));
                        $this->view->setVar("CountriesAll", References::getCountries());
                        $this->view->setVar("StationsStatusAll", References::getStationsStatus());
                        $this->view->setVar("Stations", Stations::getStations());
                    }
                    break;
                
            }
            $this->view->pick('/administration/'. "station_" . $view);
        }
        $this->view->setVar("messages", $messages);
    }
    
    public function userAction($reception = null, $item_id = null)
    {
        $this->view->setVar("TopMenuSelected", 'work');
        $this->view->setVar("MenuSelected", 'user');
        $this->view->setVar("MenuItemActive", $reception);
        
        if(!empty($reception))
        {
            $view = $reception;
            switch ($reception)
            {
                case 'add':
                    $this->view->setVar("StationsAll", Stations::getStations());
                    $this->view->setVar("RolesAll", Roles::getRoles());
                    $this->view->setVar("LanguagesAll", References::getLanguages());
                    $this->view->setVar("CurrencyAll", References::getCurrency());
                    $this->view->setVar("Units1", References::getUnits(NULL, array(1))['units']);
                    $this->view->setVar("Units2", References::getUnits(NULL, array(3))['units']);
                    $this->view->setVar("Units3", References::getUnits(NULL, array(4))['units']);
                    break;
                    
                case 'preview':
                    if($this->request->isPost())
                    {
                        if((bool)$this->request->getPost('add'))
                        {
                            View::addMessages($this, [Users::addUser($this->request->getPost())]);
                        }
                        if((bool)$this->request->getPost('delete'))
                        {
                            View::addMessages($this, [Users::deleteUser($this->request->getPost('id'))]);
                        }
                    }
                    $this->view->setVar("UsersAll", Users::getUsers());
                    break;
                
                case 'edit':
                    if(empty($item_id))
                    {
                        if($this->request->isPost())
                        {
                            $this->response->redirect('/administration/user/edit/' . $this->request->getPost('user_id'), '/');
                        }
                        View::addMessages($this, [array(
                            'class' => 'alert-info',
                            'text' => "<p><b>Выберите</b> из выпадающего списка <b>профиль пользователя</b>, который нужно изменить.</p>"
                        )]);
                        $this->view->setVar("UsersAll", Users::getUsers());
                    }
                    else
                    {
                        if($this->request->isPost())
                        {
                            View::addMessages($this, [Users::setUser($this->request->getPost())]);
                        }
                        $this->view->setVar("User", Users::getUsers($item_id));
                        $this->view->setVar("StationsAll", Stations::getStations());
                        $this->view->setVar("RolesAll", Roles::getRoles());
                        $this->view->setVar("LanguagesAll", References::getLanguages());
                        $this->view->setVar("CurrencyAll", References::getCurrency());
                        $this->view->setVar("Units1", References::getUnits(NULL, array(1))['units']);
                        $this->view->setVar("Units2", References::getUnits(NULL, array(3))['units']);
                        $this->view->setVar("Units3", References::getUnits(NULL, array(4))['units']);
                    }
                    break;
                
            }
            $this->view->pick('/administration/'. "user_" . $view);
        }
    }
    
    public function personAction($reception = null, $item_id = null)
    {
        $this->view->setVar("TopMenuSelected", 'work');
        $this->view->setVar("MenuSelected", 'persons');
        $this->view->setVar("MenuItemActive", $reception);
        
        $messages = array();
        
        if(!empty($reception))
        {
            $view = $reception;
            switch ($reception)
            {
                case 'add':
                    
                    $this->view->setVar("CountriesAll", References::getCountries());
                    
                    break;
                    
                case 'preview-cache-station':
                    if($this->request->isPost())
                    {
                        if((bool)$this->request->getPost('add'))
                        {
                            View::addMessages($this, [References::addPersonNew(
                                $this->request->getPost('full_name'),
                                $this->request->getPost('address'),
                                $this->request->getPost('country_id'),
                                3,
                                $this->request->getPost('code'),
                                1,
                                $this->request->getPost('phone'),
                                Users::getStationId($this)
                            )]);
                        }
                    }
                    View::addMessages($this, [array(
                        'class' => 'alert-info',
                        'text' => "<p>Перечень записей Адресной книги кэшированных только для этой станции.</p>"
                    )]);
                    $this->view->setVar("PersonsCacheAll", References::getPersonsCache(Users::getStationId($this)));
                    break;
                    
                case 'preview-cache':
                    if($this->request->isPost())
                    {
                        
                    }
                    View::addMessages($this, [array(
                        'class' => 'alert-info',
                        'text' => "<p>Перечень часто использующихся записей Адресной книги всех станций.</p>"
                    )]);
                    $this->view->setVar("PersonsCacheAll", References::getPersonsHot());
                    break;
                    
                case 'preview':
                    if($this->request->isPost())
                    {
                        //if(!empty($this->request->getPost('add')))
                        {
                            //$messages[] = Users::addUser($this->request->getPost());
                        }
                        //if(!empty($this->request->getPost('delete')))
                        {
                            //$messages[] = Users::deleteUser($this->request->getPost('id'));
                        }
                    }
                    View::addMessages($this, [array(
                        'class' => 'alert-info',
                        'text' => "<p>Полный перечень записей Адресной книги всех станций.</p>"
                    )]);
                    $this->view->setVar("PersonsCacheAll", References::getPersonsAll());
                    break;
                
                case 'edit':
                    if(empty($item_id))
                    {
                        if($this->request->isPost())
                        {
                            $this->response->redirect('/administration/user/edit/' . $this->request->getPost('user_id'), '/');
                        }
                        $messages[] = array(
                            'class' => 'alert-info',
                            'text' => "<p><b>Выберите</b> из выпадающего списка <b>профиль пользователя</b>, который нужно изменить.</p>"
                        );
                        $this->view->setVar("UsersAll", Users::getUsers());
                    }
                    else
                    {
                        if($this->request->isPost())
                        {
                            $messages[] = Users::setUser($this->request->getPost());
                        }
                        $this->view->setVar("User", Users::getUsers($item_id));
                        $this->view->setVar("StationsAll", Stations::getStations());
                        $this->view->setVar("RolesAll", Roles::getRoles());
                        $this->view->setVar("LanguagesAll", References::getLanguages());
                        $this->view->setVar("CurrencyAll", References::getCurrency());
                        $this->view->setVar("Units1", References::getUnits(NULL, array(1))['units']);
                        $this->view->setVar("Units2", References::getUnits(NULL, array(3))['units']);
                        $this->view->setVar("Units3", References::getUnits(NULL, array(4))['units']);
                    }
                    break;
                
                case 'settings':
                    if($this->request->isPost())
                    {
                        //if(!empty($this->request->getPost('add')))
                        {
                            $messages[] = Users::addUser($this->request->getPost());
                        }
                        //if(!empty($this->request->getPost('delete')))
                        {
                            //$messages[] = Users::deleteUser($this->request->getPost('id'));
                        }
                    }
                    $this->view->setVar("UsersAll", Users::getUsers());
                    break;
            }
            $this->view->pick('/administration/'. "person_" . $view);
        }
        //$this->view->setVar("messages", $messages);
    }
}