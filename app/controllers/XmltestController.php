<?php

class XmltestController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        echo('<pre>');
        echo('<h2>Users::getRights</h2>');
        //print_r(Users::getRights(1));
        print_r(Users::getRights($this->session->get('auth')['id']));
        echo('<h2>Users::getFuncViewsForPage</h2>');
        print_r(Users::getFuncViewsForPage('page1',1));
        echo('<h2>Users::getAllMenuItems</h2>');
        print_r(Users::getAllMenuItems(1));
        echo('<h2>Users::getMainMenuItems</h2>');
        print_r(Users::getMainMenuItems(1));
        echo('<h2>Users::getActionMenuItems</h2>');
        print_r(Users::getActionMenuItems(1));
        echo('<h2>ResourceStrings::getString</h2>');
        print_r(ResourceStrings::getString("main_page", "en"));
        echo('<h2>ResourceStrings::getStringLang</h2>');
        echo(ResourceStrings::getStringLang("main_page"));
        echo('<h2>Session</h2>');
        print_r($this->session->get('auth'));
        echo('<h2>Package:addNotDocument</h2>');
        $att[] = array('description' => 'Hello', 'unit_count'=>10, 'units_id'=>1,'unit_price'=>10);
        $arr[] = array('length'=>10, 'width'=>11,'height'=>12,'units_id'=>1,'attachment'=>$att);
        //echo Package::addNotDocument('1','2','3','4','5','6','7','8','9','10',$arr,'1','1','1','1','1','1','1','1','1','1');
        echo('</pre>');
    }
}
