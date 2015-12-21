<?php

class MainMenu {
    
    public static function getMainMenuItems($user_id)
    {
        $di = Phalcon\DI::getDefault();
        $file = $di->get('main_menu_items')['config'];
        $main_menu_items_path = $di->get('main_menu_items')['dir'];
        $doc = new SimpleXMLElement(file_get_contents($file));
        $items = FuncViews::getMenuItems($user_id);
        
        $menu_items = array();

        foreach ($doc->item as $item)
        {
            $name = json_decode(json_encode($item['name']), TRUE)[0];
            if(in_array($name, $items))
            {
                $menu_items[] = $main_menu_items_path . $name . ".volt";
            }
        }
        return $menu_items;
    }
}
