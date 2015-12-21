<?php

class FuncViews
{   
    public static function getFuncViewsForPage($page_name, $user_id)
    {
        $di = Phalcon\DI::getDefault();
        $file = $di->get('func_view')['config'];
        $func_view_path = $di->get('func_view')['dir'];
        $doc = new SimpleXMLElement(file_get_contents($file));
        $views = array();
        
        $rights = Users::getRights($user_id);
        
        foreach ($doc->page as $page)
        {
            if($page['page_name'] == $page_name)
            {
                $views = $page->func_view;
                break;
            }
        }
        
        $func_view = array();
        
        foreach ($views as $view)
        {
            foreach ($rights as $right)
            {
                if($view['right'] == $right['right'])
                {
                    $func_view[] = array('name' => $func_view_path . json_decode(json_encode($view['name']), TRUE)[0] . '.volt');
                }
            }
        }
        return $func_view;
    }
    
    public static function getFuncViewsNamesForPage($page_name, $user_id)
    {
        $di = Phalcon\DI::getDefault();
        $file = $di->get('func_view')['config'];
        $func_view_path = $di->get('func_view')['dir'];
        $doc = new SimpleXMLElement(file_get_contents($file));
        $views = array();
        
        $rights = Users::getRights($user_id);
        
        foreach ($doc->page as $page)
        {
            if($page['page_name'] == $page_name)
            {
                $views = $page->func_view;
                break;
            }
        }
        
        $func_view = array();
        
        foreach ($views as $view)
        {
            foreach ($rights as $right)
            {
                if($view['right'] == $right['right'])
                {
                    $func_view[] = array('name' => $func_view_path . json_decode(json_encode($view['name']), TRUE)[0] . '.volt');
                }
            }
        }
        return $func_view;
    }
    
    public static function getMenuItems($user_id)
    {
        $di = Phalcon\DI::getDefault();
        $file = $di->get('func_view')['config'];
        $doc = new SimpleXMLElement(file_get_contents($file));
        
        $menu_items = array();
        foreach ($doc->page as $page)
        {
            $func_view = FuncViews::getFuncViewsNamesForPage((json_decode(json_encode($page['page_name']), TRUE)[0]), $user_id);
            if(count($func_view) != 0)
            {
                $menu_items[] = (json_decode(json_encode($page['menu_item']), TRUE)[0]);
            }
        }     
        return $menu_items;
    }
}

