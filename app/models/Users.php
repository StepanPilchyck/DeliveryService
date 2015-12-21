<?php

class Users extends \Phalcon\Mvc\Model 
{
    
    //get...
    public static function getId($t)
    {
        return $t->session->get('auth')['id'];
    }
    
    public static function getStationId($t)
    {
        return $t->session->get('auth')['station_id'];
    }
    
    public static function getUsers($id = null)
    {
        $user = new Users();
        $query = "SELECT * FROM users_get($id)";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $user, $user->getReadConnection()->query($query));
	if(empty($id))
        {
            return $res->toArray();
        }
        else
        {
            return $res->toArray()[0];
        }
    }
    
    public static function getUserName()
    {
        $di = Phalcon\DI::getDefault();
        return $di->get('session')->get('user')['first_name']." ".$di->get('session')->get('user')['last_name'];
    }
    
    public static function getRights($id)
    {
        $sql = "SELECT * FROM users_get_rights($id);";
        $user = new Users();
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $user, $user->getReadConnection()->query($sql));
	return $res->toArray();
    }
    
    public static function getLang($id)
    {
        $sql = "SELECT users_get_lang($id) AS lang;";
        $user = new Users();
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $user, $user->getReadConnection()->query($sql));
	$res = $res->toArray();
        return $res[0]['lang'];
    }
    
    public static function getFuncViewsForPage($page, $id)
    {
        return FuncViews::getFuncViewsForPage($page, $id);
    }
    
    public static function getAllMenuItems($id)
    {
        return FuncViews::getMenuItems($id);
    }
    
    public static function getActionMenuItems($id)
    {
        return ActionMenu::getActionMenuItems($id);
    }
    
    public static function getMainMenuItems($id)
    {
        return MainMenu::getMainMenuItems($id);
    }
    
    
    public static function isDeleted($id)
    {
        $sql = "SELECT * FROM user_is_deleted($id);";
        $user = new Users();
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $user, $user->getReadConnection()->query($sql));
        return $res->toArray()[0]['user_is_deleted'];
    }
    
    public static function isBlocked($id)
    {
        $sql = "SELECT * FROM user_is_blocked($id);";
        $user = new Users();
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $user, $user->getReadConnection()->query($sql));
        return $res->toArray()[0]['user_is_blocked'];
    }
    
    public static function Login($login, $password)
    {
        $login = pg_escape_string($login);
        $password = pg_escape_string($password);
        $sql = "SELECT * FROM user_login('$login', '$password')";
        $user = new Users();
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $user, $user->getReadConnection()->query($sql));
	return $res->toArray()[0]['user_login'];
    }
    
    //add...
    public static function addUser($data)
    {
        /*
        station_id_value INTEGER,
	role_id_value INTEGER,
	language_id_value INTEGER,
	currency_id_value INTEGER,
	unit_id1_value INTEGER,
	unit_id2_value INTEGER,
	unit_id3_value INTEGER,
	first_name_value VARCHAR(255),
	last_name_value VARCHAR(255),
	e_mail_value VARCHAR(255),
	password_value VARCHAR(255),
	blocked_value BOOLEAN DEFAULT FALSE,
	middle_name_value VARCHAR(255) DEFAULT NULL,
	description_value VARCHAR(255) DEFAULT NULL
        */
        
        $blocked = "FALSE";
        if(!empty($data['blocked']))
        {
            $blocked = "TRUE";
        }
        
        $user = new Users();
        
        $query = "SELECT users_add(".
            $data['station_id'] .", ".
            $data['role_id'] .", ".
            $data['language_id'] .", ".
            $data['currency_id'] .", ".
            $data['unit_id1'] .", ".
            $data['unit_id2'] .", ".
            $data['unit_id3'] .", ".
            "'". pg_escape_string($data['first_name']) ."', ".
            "'". pg_escape_string($data['last_name']) ."', ".
            "'". pg_escape_string($data['e_mail']) ."', ".
            "'". pg_escape_string($data['password']) ."', ".
            $blocked .", ".
            "'". pg_escape_string($data['middle_name']) ."', ".
            "'". pg_escape_string($data['description']) ."' ".
        ");";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $user, $user->getReadConnection()->query($query));
        
        if($res->toArray()[0]['users_add'] == -1)
        {
            return array(
                'class' => 'alert-warning',
                'text' => "<p>Профиль <b>". $data['first_name'] ." ". $data['last_name'] ." не</b> был <b>добавлен</b>, т. к. запись с таким e-mail уже <b>существует</b> в базе.<br> ".
                "Следующие значения не должны повторяться: ".
                "<ul>".
                "<li>e-mail: <b>". $data['e_mail'] ."</b>;</li>".
                "</ul></p>"
            );
        }
        return array(
            'class' => 'alert-success',
            'text' => "<p>Добавление <b>". $data['name'] ."</b> произошло успешно.</p>"
        );
    }
    
    //set...
    public static function setUser($data)
    {
        $user = new Users();
        
        $blocked = "FALSE";
        if(!empty($data['blocked']))
        {
            $blocked = "TRUE";
        }
        
        $date_on_delete = "NULL";
        if(!empty($data['date_on_delete']))
        {
            $date_on_delete = "'". date('Y-m-d H:i:sO', mktime()) ."'";
        }
        
        $query = "
            UPDATE users
            SET ".
                "station_id = ". $data['station_id'] .", ".
                "role_id = ". $data['role_id'] .", ".
                "language_id = ". $data['language_id'] .", ".
                "currency_id = ". $data['currency_id'] .", ".
                "unit_id1 = ". $data['unit_id1'] .", ".
                "unit_id2 = ". $data['unit_id2'] .", ".
                "unit_id3 = ". $data['unit_id3'] .", ".
                "first_name = '". pg_escape_string($data['first_name']) ."', ".
                "last_name = '". pg_escape_string($data['last_name']) ."', ".
                "date_on_last_edit = '". date('Y-m-d H:i:sO', mktime()) ."', ".
                "date_on_delete = ". $date_on_delete .", ".
                "e_mail = '". pg_escape_string($data['e_mail']) ."', ".
                "password = crypt('". pg_escape_string($data['password']) ."', gen_salt('bf',10)), ".
                "blocked = ". $blocked .", ".
                "middle_name = ". "'". pg_escape_string($data['middle_name']) ."', ".
                "description = ". "'". pg_escape_string($data['description']) ."' ".
            "WHERE (id = ". $data['id'] ."); ";
        
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $user, $user->getReadConnection()->query($query));
        
        return array(
            'class' => 'alert-success',
            'text' => "<p>Изменение данных произошло успешно.</p>"
        );
    }
    
    //delete...
    public static function deleteUser($id)
    {
        $user = new Users();
        $links = Users::getUsers($id);
        if(count($links) > 0)
        {
            if (($links['from_users_message'] > 0) || 
            ($links['from_message'] > 0) || 
            ($links['from_package_transport_history'] > 0) || 
            ($links['from_package_vcs'] > 0))
            {
                return array(
                    'class' => 'alert-warning',
                    'text' => "<p>Запись <b> ". $links['first_name'] ." ". $links['last_name'] ." не</b> может быть <b>удалена</b>, так как связана с одной или несколькими записями. Необходимо <b>переопределить</b> или <b>удалить</b> эти связи, после чего повторите попытку.</p>"
                );
            }
            else
            {
                $query = "DELETE FROM users WHERE id = $id";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $user, $user->getReadConnection()->query($query));
                return array(
                    'class' => 'alert-success',
                    'text' => "<p>Удаление записи <b>". $links['first_name'] ." ". $links['last_name'] ."</b> произошло успешно.</p>"
                );
            }
        }
        
        return array(
            'class' => 'alert-danger',
            'text' => "<p>Запись не найдена.</p>"
        );
    }
}