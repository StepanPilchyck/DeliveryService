<?php

class Stations extends \Phalcon\Mvc\Model 
{
    //get...
    public static function getStations($id = null)
    {
        $stations = new Stations();
        $query = "SELECT * FROM stations_list_get($id)";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $stations, $stations->getReadConnection()->query($query));
	if(empty($id))
        {
            return $res->toArray();
        }
        else
        {
            return $res->toArray()[0];
        }
    }
    
    
    //add...
    public static function addStation($data)
    {
        /*
        full_name_value VARCHAR(255),
        full_name_en_value VARCHAR(255),
        station_code_value INTEGER,
        full_address_value VARCHAR(255),
        full_address_en_value VARCHAR(255),
        longitude_value REAL,
        width_value REAL,
        country_id_value INTEGER,
        station_status_id_value INTEGER,
        ttl_persons_cache_value INTEGER,
        branch_office_value INTEGER DEFAULT NULL,
        airport_value VARCHAR(255) DEFAULT NULL
        */
        
        $stations = new Stations();
        
        $branch_office = null;
        $airport = null;
        if(isset($data['branch_office']))
        {
            $branch_office = ", ". $data['branch_office'] ." ";
        }
        if(isset($data['airport']))
        {
            $airport = ", '". pg_escape_string($data['airport']) ."' ";
        }
        
        $query = "SELECT stations_list_add(".
            "'". pg_escape_string($data['name']) ."', ".
            "'". pg_escape_string($data['name_en']) ."', ".
            $data['code'] .", ".
            "'". pg_escape_string($data['address']) ."', ".
            "'". pg_escape_string($data['address_en']) ."', ".
            $data['l'] .", ".
            $data['w'] .", ".
            $data['country_id'] .", ".
            $data['station_status_id'] .", ".
            $data['ttl_persons_cache'] ." ".
            $branch_office .
            $airport .
        ");";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $stations, $stations->getReadConnection()->query($query));
        
        if($res->toArray()[0]['stations_list_add'] == -1)
        {
            return array(
                'class' => 'alert-warning',
                'text' => "<p>Запись <b>". $data['name'] ." не</b> была <b>добавлена</b>, т. к. запись с такими данными уже <b>существует</b> в базе.<br> ".
                "Следующие значения не должны повторяться: ".
                "<ul>".
                "<li>Название: <b>". $data['name'] ."</b>;</li>".
                "<li>Назв. (en): <b>". $data['name_en'] ."</b>;</li>".
                "<li>Адрес: <b>". $data['address'] ."</b>;</li>".
                "<li>Адр. (en): <b>". $data['address_en'] ."</b>.</li>".
                "</ul></p>"
            );
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Добавление <b>". $data['name'] ."</b> произошло успешно.</p>"
        );
    }
    

    //set...
    public static function setStation($data)
    {
        $stations = new Stations();
        
        $branch_office = null;
        $airport = null;
        
        if(isset($data['branch_office']))
        {
            $branch_office = ", branch_office = ". $data['branch_office'] ." ";
        }
        if(isset($data['airport']))
        {
            $airport = ", airport = '". pg_escape_string($data['airport']) ."' ";
        }
        
        $query = "
            UPDATE stations_list
            SET ".
                "full_name = '". pg_escape_string($data['name']) ."', ".
                "full_name_en = '". pg_escape_string($data['name_en']) ."', ".
                "station_code = ". $data['code'] .", ".
                "full_address = '". pg_escape_string($data['address']) ."', ".
                "full_address_en = '". pg_escape_string($data['address_en']) ."', ".
                "longitude = ". $data['l'] .", ".
                "width = ". $data['w'] .", ".
                "country_id = ". $data['country_id'] .", ".
                "station_status_id = ". $data['station_status_id'] .", ".
                "date_on_last_edit = '". date('Y-m-d H:i:sO', mktime()) ."', ".
                "ttl_persons_cache = ". $data['ttl_persons_cache'] ." ".
                $branch_office .
                $airport .
            "WHERE (id = ". $data['id'] ."); ";
        
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $stations, $stations->getReadConnection()->query($query));
        
        return array(
            'class' => 'alert-success',
            'text' => "<p>Изменение данных произошло успешно.</p>"
        );
    }
    
    
    //delete...
    public static function deleteStation($id)
    {
        $stations = new Stations();
        $links = Stations::getStations($id);
        if(count($links) > 0)
        {
            if (($links['from_users'] > 0) || 
            ($links['from_package_transport_history'] > 0) || 
            ($links['from_registry'] > 0) || 
            ($links['from_manifests'] > 0) || 
            ($links['from_persons_cache'] > 0))
            {
                return array(
                    'class' => 'alert-warning',
                    'text' => "<p>Запись <b> ". $links['name'] ." не</b> может быть <b>удалена</b>, так как связана с одной или несколькими записями. Необходимо <b>переопределить</b> или <b>удалить</b> эти связи, после чего повторите попытку.</p>"
                );
            }
            else
            {
                $query = "DELETE FROM stations_list WHERE id = $id";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $stations, $stations->getReadConnection()->query($query));
                return array(
                    'class' => 'alert-success',
                    'text' => "<p>Удаление записи <b>". $links['name'] ."</b> произошло успешно.</p>"
                );
            }
        }
        
        return array(
            'class' => 'alert-danger',
            'text' => "<p>Запись не найдена.</p>"
        );
    }
}