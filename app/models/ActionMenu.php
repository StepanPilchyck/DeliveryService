<?php

class ActionMenu {
    /**
     * 
     * @param integer $user_id User id
     * @return array[] 2D array of items of the action menu
     */
    public static function getActionMenuItems($user_id)
    {
        $di = Phalcon\DI::getDefault();
        $file = $di->get('action_menu_items')['config'];
        $action_menu_items_path = $di->get('action_menu_items')['dir'];
        $doc = new SimpleXMLElement(file_get_contents($file));
        $items = FuncViews::getMenuItems($user_id);
        
        $top_level_items = array();

        foreach ($doc->top_level_item as $top_level_item)
        {
            $low_level_times = array();
            $menu_items = $top_level_item->menu_item;
            $flag = false;
            foreach($menu_items as $menu_item)
            {      
                if(in_array($menu_item['name'], $items))
                {
                    $low_level_times[] = $action_menu_items_path . 
                           $menu_item['name']. ".volt";
                    $flag = true;
                }    
            }
            if($flag == true)
            {
                $top_level_items[] = array("name" => $action_menu_items_path. 
                    json_decode(json_encode($top_level_item['top_level_item_name']), 
                            TRUE)[0]. ".volt", "sub_items"=>$low_level_times);
            }
        }
        return $top_level_items;
    }
}