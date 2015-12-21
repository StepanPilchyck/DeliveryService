<?php

class ResourceStrings {
    
    public static function getString($name, $lang)
    {
        $di = Phalcon\DI::getDefault();
        $file = $di->get('resource_strings')['config'];
        $doc = new SimpleXMLElement(file_get_contents($file));

        foreach ($doc->string as $str)
        {
            $str_name = json_decode(json_encode($str['name']), TRUE)[0];
            if($str_name == $name)
            {
                foreach($str->lang as $item)
                {
                    $lang_name = json_decode(json_encode($item['lang_name']), TRUE)[0];
                    if($lang_name == $lang)
                    {
                        return json_decode(json_encode($item['value']), TRUE)[0];
                    }
                }
                break;
            }
        }
        return "";
    }
    
    public static function getStringLang($name)
    {
        $di = Phalcon\DI::getDefault();
        $cookies = new Phalcon\Http\Response\Cookies();
        if(!$cookies->has('lang'))
        {
            $lang = Users::getLang($di->get('session')->get('auth')['id']);
        }
        else
        {
            $lang = $cookies->get('lang');
        }       
        
        return ResourceStrings::getString($name, $lang);
    }
}
