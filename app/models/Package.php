<?php

class Package extends \Phalcon\Mvc\Model 
{
    public static function addNotDocument(
        $sender_full_name_value, 
        $sender_full_address_value, 
        $sender_country_id_value, 
        $recipient_full_name_value, 
        $recipient_full_address_value, 
        $recipient_country_id_value,
        $station_id_value,
        $description_value, 
        $place_count_value,
        $full_weight_value, 
        $currency_id_value, 
        $package_contents_places, 
        $comment_id_value, 
        $sender_code_value, 
        $recipient_code_value, 
        $sender_phone_value, 
        $recipient_phone_value, 
        $guarantor_value, 
        $date_on_reception_value
    )
    {
        $array_str = "ARRAY[";
        $i = 0;
        foreach ($package_contents_places as $place)
        {
            $array_str = $array_str . "row(";
            $length = $place['length'];
            $width = $place['width'];
            $height = $place['height'];
            $units_id = $place['units_id'];
            $place_attachments = $place['attachment'];
            
            $array_str = $array_str . $length  . "," . $width . "," . $height . "," . $units_id . ",";
            $array_att = "ARRAY[";
            $j = 0;
            foreach($place_attachments as $attachment)
            {
                $array_att = $array_att . "row(";
                $description = $attachment['description'];
                $unit_count = $attachment['unit_count'];
                $unit_id_value = $attachment['units_id'];
                $unit_price = $attachment['unit_price'];
                $array_att = $array_att . "'" . pg_escape_string($description) . "'," . $unit_count . "," . $unit_id_value . "," . $unit_price;
                if($j == count($place_attachments) - 1)
                {
                    $array_att = $array_att . ")::package_contents_place_attachment_type";
                }
                else
                {
                    $array_att = $array_att . ")::package_contents_place_attachment_type,";
                }
                $j++;
            }
            $array_att = $array_att . "]";
            $array_str = $array_str . $array_att;
            
            if($i == count($package_contents_places) - 1)
            {
                $array_str = $array_str . ")::package_contents_place_type";
            }
            else
            {
                $array_str = $array_str . ")::package_contents_place_type,";
            }
            $i++;
        }
        $array_str = $array_str . "]";
        
        $query = "SELECT package_add_all_not_document(";
        $query .= "'" . pg_escape_string($sender_full_name_value) . "',";
        $query .= "'" . pg_escape_string($sender_full_address_value) . "',";
        $query .= $sender_country_id_value . ",";
        $query .= "'" . pg_escape_string($recipient_full_name_value) . "',";
        $query .= "'" . pg_escape_string($recipient_full_address_value) . "',";
        $query .= $recipient_country_id_value . ",";
        $query .= $station_id_value . ",";
        $query .= "'" . pg_escape_string($description_value) . "',";
        $query .= $place_count_value . ",";
        $query .= $full_weight_value . ",";
        $query .= $currency_id_value . ",";
        $query .= $array_str . ",";
        $query .= "'" . pg_escape_string($comment_id_value) . "',";
        $query .= $sender_code_value . ",";
        $query .= $recipient_code_value . ",";
        $query .= "'" . $sender_phone_value . "',";
        $query .= "'" . $recipient_phone_value . "',";
        $query .= "'" . pg_escape_string($guarantor_value) . "',";
        $query .= "'" . pg_escape_string($date_on_reception_value)  . "'";
        $query .= ")";
        
        //return $query;
        
        $package = new Package();
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $package, $package->getReadConnection()->query($query));
	return $res->toArray();
    }
    
    public static function addDocument(
        $sender_full_name_value, 
        $sender_full_address_value, 
        $sender_country_id_value, 
        $recipient_full_name_value, 
        $recipient_full_address_value, 
        $recipient_country_id_value, 
        $station_id_value, 
        $description_value, 
        $place_count_value,
        $full_weight_value, 
        $currency_id_value, 
        $comment_id_value,
        $sender_code_value,
        $recipient_code_value, 
        $sender_phone_value, 
        $recipient_phone_value, 
        $guarantor_value,
        $date_on_reception_value
    )
    {
        $query = "SELECT package_add_all_document(";
        $query .= "'" . pg_escape_string($sender_full_name_value) . "',";
        $query .= "'" . pg_escape_string($sender_full_address_value) . "',";
        $query .= $sender_country_id_value . ",";
        $query .= "'" . pg_escape_string($recipient_full_name_value) . "',";
        $query .= "'" . pg_escape_string($recipient_full_address_value) . "',";
        $query .= $recipient_country_id_value . ",";
        $query .= $station_id_value . ",";
        $query .= "'" . pg_escape_string($description_value) . "',";
        $query .= $place_count_value . ",";
        $query .= $full_weight_value . ",";
        $query .= $currency_id_value . ",";
        $query .= "'" . pg_escape_string($comment_id_value) . "',";
        $query .= $sender_code_value . ",";
        $query .= $recipient_code_value . ",";
        $query .= "'" . $sender_phone_value . "',";
        $query .= "'" . $recipient_phone_value . "',";
        $query .= "'" . pg_escape_string($guarantor_value) . "',";
        $query .= "'" . pg_escape_string($date_on_reception_value)  . "'";
        $query .= ")";
        
        //return $query;
        
        $package = new Package();
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $package, $package->getReadConnection()->query($query));
	return $res->toArray();
    }
    
    public static function findPackages($data, $station_id)
    {
        
        $WHERE = " WHERE TRUE ";
        $date_on_reception_to = "2010-01-01 0:00:00";
        $date_on_reception_do = date('Y-m-d H:i:s', mktime());
        
        $content_price_to = 0;
        $content_price_do = 999999999;
        
        // Search for package
        if($data[package][htd])
        {
            $WHERE .= " AND htd.htd = " . $data[package][htd];
        }
        if(($data[package][date_on_reception_to]) || ($data[package][date_on_reception_do]))
        {
            if($data[package][date_on_reception_to])
            {
                $date_on_reception_to = $data[package][date_on_reception_to] . ' 00:00';
            }
            if($data[package][date_on_reception_do])
            {
                $date_on_reception_do = $data[package][date_on_reception_do] . ' 23:00';
            }
            $WHERE .= " AND package.date_on_reception BETWEEN '" . 
                    $date_on_reception_to . "' AND '" .
                    $date_on_reception_do . "' ";
        }
        if(($data[package][content_price_to]) || ($data[package][content_price_do]))
        {
            if($data[package][content_price_to])
            {
                $content_price_to = $data[package][content_price_to];
            }
            if($data[package][content_price_do])
            {
                $content_price_do = $data[package][content_price_do];
            }
            $WHERE .= " AND pc.content_price BETWEEN " . 
                    $content_price_to . " AND " .
                    $content_price_do . " ";
        }
        if($data[package][station_id])
        {
            $WHERE .= " AND pth.station_id = " . $data[package][station_id];
        }
        if($data[package][statys_id])
        {
            $WHERE .= " AND pth.status_id = " . $data[package][statys_id];
        }
        if($data[package][full_name])
        {
            $WHERE .= " AND (package.sender_full_name LIKE '%" . $data[package][full_name] . "%' ";
            $WHERE .= " OR package.recipient_full_name LIKE '%" . $data[package][full_name] . "%') ";
        }
        if($data[package][phone])
        {
            $WHERE .= " AND (package.sender_phone LIKE '%" . $data[package][phone] . "%' ";
            $WHERE .= " OR package.recipient_phone LIKE '%" . $data[package][phone] . "%') ";
        }
        if($data[package][country_id])
        {
            $WHERE .= " AND (package.sender_country_id = " . $data[package][country_id];
            $WHERE .= " OR package.recipient_country_id = " . $data[package][country_id] . ") ";
        }
        if($data[package][full_address])
        {
            $WHERE .= " AND (package.sender_full_address LIKE '%" . $data[package][full_address] . "%' ";
            $WHERE .= " OR package.recipient_full_address LIKE '%" . $data[package][full_address] . "%') ";
        }
        if($data[package][content_type])
        {
            if($data[package][content_type] != 'NULL')
            {
                $WHERE .= " AND pc.content_type = " . $data[package][content_type];
            }
        }
        
        // Search for persons
        if($data[person][code])
        {
            $WHERE .= " AND pcache.code LIKE '%" . $data[person][code] . "%' ";
        }
        if($data[person][full_name])
        {
            $WHERE .= " AND phot.person_full_name LIKE '%" . $data[person][full_name] . "%' ";
        }
        if($data[person][phone])
        {
            $WHERE .= " AND phot.person_phone LIKE '%" . $data[person][phone] . "%' ";
        }
        if($data[person][country_id])
        {
            $WHERE .= " AND phot.person_country_id = " . $data[person][country_id];
        }
        if($data[person][full_address])
        {
            $WHERE .= " AND phot.person_full_address LIKE '%" . $data[person][full_address] . "%' ";
        }
        if($data[person][status1] && $data[person][status2])
        {
            $WHERE .= " AND phot.person_status = " . $data[person][status1];
            $WHERE .= " OR phot.person_status = " . $data[person][status2];
        }
        if($data[person][status1])
        {
            $WHERE .= " AND phot.person_status = " . $data[person][status1];
        }
        
        if($data[person][status2] && !$data[person][status1])
        {
            if($data[person][status1])
            {
                $WHERE .= " AND phot.person_status = " . $data[person][status1];
            }
            else
            {
                $WHERE .= " AND phot.person_status = " . $data[person][status2];
            }
        }
        
        $query = "
            SELECT DISTINCT ON 
                (htd.htd) htd,
                cl1.name as sender_county_name,
                package.sender_full_name,
                cm.description as comment,
                cl2.name as recipient_county_name,
                package.recipient_full_name,
                pc.place_count,
                pc.full_weight,
                pc.content_price,
                cl.short_name,
                to_char(package.date_on_add, 'DD.MM.YYYY') AS date_on_add,
                (SELECT full_name_en FROM stations_list WHERE id = (SELECT station_id FROM package_transport_history WHERE package_transport_history.id =
                (SELECT MAX(id) FROM package_transport_history WHERE package_id = package.id))) as station_name,
                (SELECT name FROM package_status_list WHERE id = (SELECT status_id FROM package_transport_history WHERE package_transport_history.id =
                (SELECT MAX(id) FROM package_transport_history WHERE package_id = package.id))) as status_name
            FROM home_transport_documents htd
            JOIN package on (package.id = htd.package_id)
            JOIN countries_list cl1 on (cl1.id = package.sender_country_id)
            JOIN countries_list cl2 on (cl2.id = package.recipient_country_id)
            JOIN package_contents pc on (pc.package_id = package.id)
            LEFT JOIN currency_list cl on (cl.id = pc.currency_id)
            LEFT JOIN comments_list cm on (pc.comment_id = cm.id)
            
            LEFT JOIN package_transport_history pth on (pth.package_id = htd.package_id)
            LEFT JOIN persons_cache pcache on (pcache.station_id = ". $station_id .")
            LEFT JOIN persons_hot_list phot on (phot.id = pcache.person_id)
            $WHERE
            ORDER BY htd.htd, package.date_on_add DESC";
        
        //return $query;
        
        $package = new Package();
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $package, $package->getReadConnection()->query($query));
	return $res->toArray();
    }
    
    public static function getAll()
    {
        $query = "
            SELECT 
                htd.htd,
                cl1.name as sender_county_name,
                package.sender_full_name,
                cm.description as comment,
                cl2.name as recipient_county_name,
                package.recipient_full_name,
                pc.place_count,
                pc.full_weight,
                pc.content_price,
                cl.short_name,
                to_char(package.date_on_add, 'DD.MM.YYYY') AS date_on_add,
                (SELECT full_name_en FROM stations_list WHERE id = (SELECT station_id FROM package_transport_history WHERE package_transport_history.id =
                (SELECT MAX(id) FROM package_transport_history WHERE package_id = package.id))) as station_name,
                (SELECT name FROM package_status_list WHERE id = (SELECT status_id FROM package_transport_history WHERE package_transport_history.id =
                (SELECT MAX(id) FROM package_transport_history WHERE package_id = package.id))) as status_name
            FROM home_transport_documents htd
            JOIN package on (package.id = htd.package_id)
            JOIN countries_list cl1 on (cl1.id = package.sender_country_id)
            JOIN countries_list cl2 on (cl2.id = package.recipient_country_id)
            JOIN package_contents pc on (pc.package_id = package.id)
            LEFT JOIN currency_list cl on (cl.id = pc.currency_id)
            JOIN comments_list cm on (pc.comment_id = cm.id)
            ORDER BY package.date_on_add DESC";
        
        //return $query;
        
        $package = new Package();
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $package, $package->getReadConnection()->query($query));
	return $res->toArray();
    }
    
    public static function setStatus(
        $package_id_value,
        $status_id_value,
        $stored_value,
        $user_id_value,
        $user_courier_id_value
    )
    {
        $query = "SELECT package_set_status(";
        $query .= $package_id_value . ",";
        $query .= $status_id_value . ",";
        $query .= $stored_value . ",";
        $query .= $user_id_value . ",";
        $query .= $user_courier_id_value;
        $query .= ")";
        
        //return $query;
        
        $package = new Package();
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $package, $package->getReadConnection()->query($query));
	return $res->toArray();
    }
}
