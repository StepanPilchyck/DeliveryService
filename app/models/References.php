<?php

class References extends \Phalcon\Mvc\Model 
{
    //get...
    public static function getCountries($id = null)
    {
        $references = new References();
        $query = "SELECT * FROM countries_list_get($id)";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
	return $res->toArray();
    }
    
    public static function getCurrency($id = null)
    {
        $references = new References();
        $query = "SELECT * FROM currency_list_get($id)";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
	return $res->toArray();
    }
    
    public static function getUnits($id = null, $types = null)
    {
        $references = new References();
        
        if(empty($id))
        {
            $id = "NULL";
        }
        
        if(empty($types))
        {
            $tmp = "ARRAY[]::integer[]";
        }
        else
        {
            $tmp = "ARRAY[". $types[0];
            for ($i=1; $i<count($types); $i++) {
                $tmp .= ",". $types[$i];
            }
            $tmp .= "]::integer[]";
        }
        
        $res = array();
        
        $query = "SELECT * FROM units_list_get($id, $tmp)";
        $res_tmp = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        $res['units'] = $res_tmp->toArray();
        
        $query = "SELECT uts.id, uts.name FROM units_types_list AS uts ORDER BY uts.id ASC;";
        $res_tmp = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        $res['types'] = $res_tmp->toArray();
        
	return $res;
    }
    
    public static function getLanguages($id = null)
    {
        $references = new References();
        $query = "SELECT * FROM languages_list_get($id)";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
	return $res->toArray();
    }
    
    public static function getPackageStatus($id = null)
    {
        $references = new References();
        $query = "SELECT * FROM package_status_list_get($id)";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
	return $res->toArray();
    }
    
    public static function getStationsStatus($id = null)
    {
        $references = new References();
        $query = "SELECT * FROM stations_status_list_get($id)";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
	return $res->toArray();
    }
    
    public static function getPersonsCache($station_id, $id = 'null')
    {
        $references = new References();
        $query = "SELECT * FROM persons_cache_get($station_id, $id)";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        return $res->toArray();
    }
    
    public static function getPersonsHot($id = 'null')
    {
        $references = new References();
        $query = "SELECT * FROM persons_hot_get($id)";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
	return $res->toArray();
    }
    
    public static function getPersonsAll($id = null)
    {
        $references = new References();
        $query = "SELECT * FROM persons_all_get($id)";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
	return $res->toArray();
    }
    
    
    //add...
    public static function addCountries($name)
    {
        $references = new References();
        $query = "SELECT countries_list_add('". pg_escape_string($name) ."')";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        if($res->toArray()[0]['countries_list_add'] == -1)
        {
            return array(
                'class' => 'alert-warning',
                'text' => "<p>Запись <b>$name не</b> была <b>добавлена</b>, т. к. запись с таким названием уже <b>существует</b> в базе.</p>"
            );
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Добавление <b>$name</b> произошло успешно.</p>"
        );
    }
    
    public static function addUnits($name, $short_name, $type_id)
    {
        $references = new References();
        $query = "SELECT units_list_add($type_id, '". pg_escape_string($name) ."', '". pg_escape_string($short_name) ."')";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        if($res->toArray()[0]['units_list_add'] == -1)
        {
            return array(
                'class' => 'alert-warning',
                'text' => "<p>Запись <b> $name не</b> была <b>добавлена</b>, т. к. запись с таким названием уже <b>существует</b> в базе.</p>"
            );
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Добавление <b>$name</b> произошло успешно.</p>"
        );
    }
    
    public static function addCurrency($name, $short_name)
    {
        $references = new References();
        $query = "SELECT currency_list_add('". pg_escape_string($name) ."', '". pg_escape_string($short_name) ."')";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        if($res->toArray()[0]['currency_list_add'] == -1)
        {
            return array(
                'class' => 'alert-warning',
                'text' => "<p>Запись <b> $name не</b> была <b>добавлена</b>, т. к. запись с таким названием уже <b>существует</b> в базе.</p>"
            );
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Добавление <b>$name</b> произошло успешно.</p>"
        );
    }
    
    public static function addLanguages($name, $short_name)
    {
        $references = new References();
        $query = "SELECT languages_list_add('". pg_escape_string($name) ."', '". pg_escape_string($short_name) ."');";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        if($res->toArray()[0]['languages_list_add'] == -1)
        {
            return array(
                'class' => 'alert-warning',
                'text' => "<p>Запись <b>$name не</b> была <b>добавлена</b>, т. к. запись с таким названием уже <b>существует</b> в базе.</p>"
            );
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Добавление <b>$name</b> произошло успешно.</p>"
        );
    }
    
    public static function addPackageStatus($name, $description)
    {
        $references = new References();
        $query = "SELECT package_status_list_add('". pg_escape_string($name) ."', '". pg_escape_string($description) ."');";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        if($res->toArray()[0]['languages_list_add'] == -1)
        {
            return array(
                'class' => 'alert-warning',
                'text' => "<p>Запись <b>$name не</b> была <b>добавлена</b>, т. к. запись с таким названием уже <b>существует</b> в базе.</p>"
            );
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Добавление <b>$name</b> произошло успешно.</p>"
        );
    }
    
    public static function addStationsStatus($name, $description)
    {
        $references = new References();
        $query = "SELECT stations_status_list_add('". pg_escape_string($name) ."', '". pg_escape_string($description) ."');";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        if($res->toArray()[0]['languages_list_add'] == -1)
        {
            return array(
                'class' => 'alert-warning',
                'text' => "<p>Запись <b>$name не</b> была <b>добавлена</b>, т. к. запись с таким названием уже <b>существует</b> в базе.</p>"
            );
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Добавление <b>$name</b> произошло успешно.</p>"
        );
    }
    
    public static function addPersonNew(
        $full_name,
        $full_address,
        $country_id,
        $status,
        $code,
        $code_prefix,
        $phone,
        $statin_id
    )
    {
        /*
        SELECT person_add(
                recipient_full_name_value,
                recipient_full_address_value,
                recipient_country_id_value,
                2::smallint,
                recipient_code_value,
                recipient_code_prefix_value,
                recipient_phone_value
        ) INTO person_id;

        PERFORM persons_cache_add(
                person_id,
                station_id_value,
                (SELECT CURRENT_TIMESTAMP)::timestamp
        );
        /**/
        
        $references = new References();
        $query = "SELECT * FROM person_add_new(" . 
            "'" . pg_escape_string($full_name) . "', " .
            "'" . pg_escape_string($full_address) . "', " .
            $country_id . ", " .
            $status . "::smallint, " .
            "'" . pg_escape_string($code) . "', " .
            $code_prefix . "::smallint, " .
            "'" . pg_escape_string($phone) . "' " .
        ");";
        
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        
        $tmp = $res->toArray();
        
        if($tmp[0][0]['person_added'])
        {
            
        }
        else
        {
            $codes = "";
            foreach ($tmp as $item)
            {
                if($codes == "")
		{
		    $codes .= $item['person_code'];
		}
		else
		{
		    $codes .= ", " . $item['person_code'];
		}
            }
            return array(
                'class' => 'alert-warning',
                'text' => "<p>Новая запись <b>не</b> была <b>добавлена</b>, т. к. такая запись уже <b>существует</b> в базе и имеет <b>код (ы): $codes</b>.</p>"
            );
        }
        
        return $query;
        
        if($res->toArray()[0]['languages_list_add'] == -1)
        {
            return array(
                'class' => 'alert-warning',
                'text' => "<p>Запись <b>$name не</b> была <b>добавлена</b>, т. к. запись с таким названием уже <b>существует</b> в базе.</p>"
            );
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Добавление <b>$name</b> произошло успешно.</p>"
        );
    }


    //set...
    public static function setCountries($data)
    {
        $references = new References();        
        foreach ($data as $key => $val)
        {
            $query = "
                UPDATE countries_list
                SET
                    name = '". pg_escape_string($val) ."'
                WHERE (id = ". $key ."); ";
            $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        }
        
        return array(
            'class' => 'alert-success',
            'text' => "<p>Изменение данных произошло успешно.</p>"
        );
    }
    
    public static function setCurrency($data)
    {
        $references = new References();        
        foreach ($data as $key => $val)
        {
            $query = "
                UPDATE currency_list
                SET
                    full_name = '". pg_escape_string($val['name']) ."',
                    short_name = '". pg_escape_string($val['short_name']) ."',
                    date_on_edit = '". date('Y-m-d H:i:sO', mktime()) ."'
                WHERE (id = ". $key ."); ";
            $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Изменение данных произошло успешно.</p>"
        );
    }
    
    public static function setUnits($data)
    {
        $references = new References();
        foreach ($data as $key => $val)
        {
            $query = "
                UPDATE units_list
                SET
                    unit_type_id = ". $val['type_id'] .",
                    full_name = '". pg_escape_string($val['name']) ."',
                    short_name = '". pg_escape_string($val['short_name']) ."',
                    date_on_edit = '". date('Y-m-d H:i:sO', mktime()) ."'
                WHERE (id = ". $key ."); ";
            $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Изменение данных произошло успешно.</p>"
        );
    }
    
    public static function setLanguages($data)
    {
        $references = new References();        
        foreach ($data as $key => $val)
        {
            $query = "
                UPDATE languages_list
                SET
                    name = '". pg_escape_string($val['name']) ."',
                    short_name = '". pg_escape_string($val['short_name']) ."'
                WHERE (id = ". $key ."); ";
            $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Изменение данных произошло успешно.</p>"
        );
    }
    
    public static function setPackageStatus($data)
    {
        $references = new References();        
        foreach ($data as $key => $val)
        {
            $query = "
                UPDATE package_status_list
                SET
                    name = '". pg_escape_string($val['name']) ."',
                    description = '". pg_escape_string($val['description']) ."'
                WHERE (id = ". $key ."); ";
            $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Изменение данных произошло успешно.</p>"
        );
    }
    
    public static function setStationsStatus($data)
    {
        $references = new References();        
        foreach ($data as $key => $val)
        {
            $query = "
                UPDATE stations_status_list
                SET
                    name = '". pg_escape_string($val['name']) ."',
                    description = '". pg_escape_string($val['description']) ."'
                WHERE (id = ". $key ."); ";
            $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Изменение данных произошло успешно.</p>"
        );
    }
    
    
    
    //delete...
    public static function deleteCountry($id)
    {
        $references = new References();
        
        $links = References::getCountries($id);
        
        if(count($links) > 0)
        {
            if (($links[0]['from_package'] > 0) || 
            ($links[0]['from_package_edit'] > 0) ||
            ($links[0]['from_stations_list'] > 0))
            {
                return array(
                    'class' => 'alert-warning',
                    'text' => "<p>Запись <b> ". $links[0]['name'] ." не</b> может быть <b>удалена</b>, так как связана с одной или несколькими записями. Необходимо <b>переопределить</b> или <b>удалить</b> эти связи, после чего повторите попытку.</p>"
                );
            }else{
                $query = "DELETE FROM countries_list WHERE id = $id";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
                return array(
                    'class' => 'alert-success',
                    'text' => "<p>Удаление записи <b>". $links[0]['name'] ."</b> произошло успешно.</p>"
                );
            }
        }
        
        return array(
            'class' => 'alert-danger',
            'text' => "<p>Запись не найдена.</p>"
        );
    }
    
    public static function deleteCurrency($id)
    {
        $references = new References();
        
        $links = References::getCurrency($id);
        
        if(count($links) > 0)
        {
            if (($links[0]['from_package_contents'] > 0) || 
            ($links[0]['from_package_contents_edit'] > 0) ||
            ($links[0]['from_users'] > 0))
            {
                return array(
                    'class' => 'alert-warning',
                    'text' => "<p>Запись <b> ". $links[0]['full_name'] ." не</b> может быть <b>удалена</b>, так как связана с одной или несколькими записями. Необходимо <b>переопределить</b> или <b>удалить</b> эти связи, после чего повторите попытку.</p>"
                );
            }else{
                $query = "DELETE FROM currency_list WHERE id = $id";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
                return array(
                    'class' => 'alert-success',
                    'text' => "<p>Удаление записи <b>". $links[0]['full_name'] ."</b> произошло успешно.</p>"
                );
            }
        }
        
        return array(
            'class' => 'alert-danger',
            'text' => "<p>Запись не найдена.</p>"
        );
    }
    
    public static function deleteUnits($id)
    {
        $references = new References();
        
        $links = References::getUnits($id);
        
        if(count($links) > 0)
        {
            if (($links['units'][0]['from_package_contents_place'] > 0) || 
            ($links['units'][0]['from_package_contents_place_attachment'] > 0) ||
            ($links['units'][0]['from_package_contents_place_edit'] > 0) ||
            ($links['units'][0]['from_package_contents_place_attachment_edit'] > 0) ||
            ($links['units'][0]['from_users'] > 0))
            {
                return array(
                    'class' => 'alert-warning',
                    'text' => "<p>Запись <b> ". $links['units'][0]['name'] ." не</b> может быть <b>удалена</b>, так как связана с одной или несколькими записями. Необходимо <b>переопределить</b> или <b>удалить</b> эти связи, после чего повторите попытку.</p>"
                );
            }else{
                $query = "DELETE FROM units_list WHERE id = $id";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
                return array(
                    'class' => 'alert-success',
                    'text' => "<p>Удаление записи <b>". $links['units'][0]['name'] ."</b> произошло успешно.</p>"
                );
            }
        }
        
        return array(
            'class' => 'alert-danger',
            'text' => "<p>Запись не найдена.</p>"
        );
    }
    
    public static function deleteLanguages($id)
    {
        $references = new References();
        
        $links = References::getLanguages($id);
        
        if(count($links) > 0)
        {
            if (($links[0]['from_users'] > 0))
            {
                return array(
                    'class' => 'alert-warning',
                    'text' => "<p>Запись <b> ". $links[0]['name'] ." не</b> может быть <b>удалена</b>, так как связана с одной или несколькими записями. Необходимо <b>переопределить</b> или <b>удалить</b> эти связи, после чего повторите попытку.</p>"
                );
            }else{
                $query = "DELETE FROM languages_list WHERE id = $id";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
                return array(
                    'class' => 'alert-success',
                    'text' => "<p>Удаление записи <b>". $links[0]['name'] ."</b> произошло успешно.</p>"
                );
            }
        }
        
        return array(
            'class' => 'alert-danger',
            'text' => "<p>Запись не найдена.</p>"
        );
    }
    
    public static function deletePackageStatus($id)
    {
        $references = new References();
        
        $links = References::getPackageStatus($id);
        
        if(count($links) > 0)
        {
            if (($links[0]['from_package_transport_history'] > 0))
            {
                return array(
                    'class' => 'alert-warning',
                    'text' => "<p>Запись <b> ". $links[0]['name'] ." не</b> может быть <b>удалена</b>, так как связана с одной или несколькими записями. Необходимо <b>переопределить</b> или <b>удалить</b> эти связи, после чего повторите попытку.</p>"
                );
            }else{
                $query = "DELETE FROM package_status_list WHERE id = $id";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
                return array(
                    'class' => 'alert-success',
                    'text' => "<p>Удаление записи <b>". $links[0]['name'] ."</b> произошло успешно.</p>"
                );
            }
        }
        
        return array(
            'class' => 'alert-danger',
            'text' => "<p>Запись не найдена.</p>"
        );
    }
    
    public static function deleteStationsStatus($id)
    {
        $references = new References();
        
        $links = References::getStationsStatus($id);
        
        if(count($links) > 0)
        {
            if (($links[0]['from_stations_list'] > 0))
            {
                return array(
                    'class' => 'alert-warning',
                    'text' => "<p>Запись <b> ". $links[0]['name'] ." не</b> может быть <b>удалена</b>, так как связана с одной или несколькими записями. Необходимо <b>переопределить</b> или <b>удалить</b> эти связи, после чего повторите попытку.</p>"
                );
            }else{
                $query = "DELETE FROM stations_status_list WHERE id = $id";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $references, $references->getReadConnection()->query($query));
                return array(
                    'class' => 'alert-success',
                    'text' => "<p>Удаление записи <b>". $links[0]['name'] ."</b> произошло успешно.</p>"
                );
            }
        }
        
        return array(
            'class' => 'alert-danger',
            'text' => "<p>Запись не найдена.</p>"
        );
    }
}