<?php

class Roles extends \Phalcon\Mvc\Model 
{
    
    public static function getRoles($id = NULL)
    {
        $roles = new Roles();
        if(empty($id))
        {
            $query = "SELECT * FROM roles_get(NULL, NULL)";
            $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
            return $res->toArray();
        }
        else
        {
            $query = "SELECT * FROM roles_get($id, 'right')";
            $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
            $role = $res->toArray();
            $roles = new Roles();
            $role_rites = array();
            $role_rites['role']['id'] = $role[0]['id'];
            $role_rites['role']['name'] = $role[0]['name'];
            $role_rites['role']['description'] = $role[0]['description'];
            $role_rites['role']['from_users'] = $role[0]['from_users'];
            $role_rites['right'] = array();

            foreach ($role as $val)
            {
                $role_rites['right'][$val['right_name']]['id'] = $val['right_id'];
                $role_rites['right'][$val['right_name']]['name'] = $val['right_name'];
                $role_rites['right'][$val['right_name']]['description'] = $val['right_description'];
            }
            return $role_rites;
        }
    }
    
    public static function setRoles($data)
    {
        $query = "
            UPDATE roles
            SET
                name = '". pg_escape_string($data['name']) ."',
                description = '". pg_escape_string($data['description']) ."'
            WHERE (id = ". $data['id'] .")";
        
        $roles = new Roles();
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
        
        foreach ($data['rights'] as $key => $val)
        {
            if(isset($val['id']))
            {
                $right_description = "";
                foreach ($val as $key2 => $val2)
                {
                    if($key2 != 'id')
                    {
                        $right_description .= $key2;
                    }
                }
                if($right_description != "")
                {
                    $query = "
                        UPDATE rights
                        SET
                            description = '". pg_escape_string($right_description) ."'
                        WHERE (id = ". $val['id'] .")";
                }
                else
                {
                    $query = "DELETE FROM role_right WHERE (role_id = ". $data['id'] .") AND (right_id = ". $val['id'] .");";
                    $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
                    $query = "DELETE FROM rights WHERE (id = ". $val['id'] .");";
                }
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
            }
            else
            {
                $right_description = "";
                foreach ($val as $key2 => $val2)
                {
                    $right_description .= $key2;
                }
                $query = "SELECT rights_add(";
                $query .= "'". pg_escape_string($key) ."',";
                $query .= "'". pg_escape_string($right_description) ."'";
                $query .= ")";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
                $right_id = $res->toArray();
                $right_id = $right_id[0]['rights_add'];
                
                $query = "SELECT role_right_add(";
                $query .= $data['id'] .",";
                $query .= $right_id;
                $query .= ")";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
            }
        }
        
        return array(
            'class' => 'alert-success',
            'text' => "<p>Изменение записи <b>". $data['name'] ."</b> произошло успешно.</p>"
        );
    }
    
    public static function addRole($data)
    {
        $role_rite = array();
        $role_rite['role']['id'] = null;
        $role_rite['role']['name'] = $data['name'];
        $role_rite['role']['description'] = $data['description'];
        $role_rite['right'] = array();
        
        $roles = new Roles();
        
        $query = "SELECT roles_add(";
        $query .= "'". pg_escape_string($role_rite['role']['name']) ."',";
        $query .= "'". pg_escape_string($role_rite['role']['description']) ."'";
        $query .= ")";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
        $role_id = $res->toArray();
        $role_rite['role']['id'] = $role_id[0]['roles_add'];
        
        $i = 0;
        foreach ($data['rights'] as $key1 => $val1)
        {
            $role_rite['right'][$i]['id'] = null;
            $role_rite['right'][$i]['name'] = $key1;
            $role_rite['right'][$i]['description'] = "";
            foreach ($val1 as $key2 => $val2)
            {
                $role_rite['right'][$i]['description'] .= $key2;
            }
            $query = "SELECT rights_add(";
            $query .= "'". pg_escape_string($role_rite['right'][$i]['name']) ."',";
            $query .= "'". pg_escape_string($role_rite['right'][$i]['description']) ."'";
            $query .= ")";
            $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
            $right_id = $res->toArray();
            $role_rite['right'][$i]['id'] = $right_id[0]['rights_add'];
            $i++;
        }
        
        foreach ($role_rite['right'] as $val)
        {
            $query = "SELECT role_right_add(";
            $query .= $role_rite['role']['id'] .",";
            $query .= $val['id'];
            $query .= ")";
            $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
        }
        
        return array(
            'class' => 'alert-success',
            'text' => "<p>Добавление <b>". $data['name'] ."</b> произошло успешно.</p>"
        );
    }
    
    public static function deleteRole($id)
    {
        $roles = new Roles();
        
        $links = Roles::getRoles($id);
        
        if(count($links) > 0)
        {
            $links = $links['role'];
            if ($links['from_users'] > 0)
            {
                return array(
                    'class' => 'alert-warning',
                    'text' => "<p>Запись <b> ". $links['name'] ." не</b> может быть <b>удалена</b>, так как связана с одной или несколькими записями. Необходимо <b>переопределить</b> или <b>удалить</b> эти связи, после чего повторите попытку.</p>"
                );
            }
            else
            {
                $query = "
                    DELETE FROM role_right AS rl_rt
                    WHERE rl_rt.role_id IN (
                            SELECT rls.id
                            FROM roles AS rls
                            WHERE (rls.id = ". $links['id'] .")
                    ); ";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));

                $query = "DELETE FROM roles WHERE (id = ". $links['id'] .");";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
                
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public static function add_role($data)
    {
        $role_rite = array();
        $role_rite['role']['id'] = null;
        $role_rite['role']['name'] = $data['role_name'];
        $role_rite['role']['description'] = $data['role_descr'];
        $role_rite['right'] = array();
        
        $roles = new Roles();
        
        $query = "SELECT roles_add(";
        $query .= "'". pg_escape_string($role_rite['role']['name']) ."',";
        $query .= "'". pg_escape_string($role_rite['role']['description']) ."'";
        $query .= ")";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
        $role_id = $res->toArray();
        $role_rite['role']['id'] = $role_id[0]['roles_add'];
        
        $i = 0;
        foreach ($data['rights'] as $key1 => $val1)
        {
            $role_rite['right'][$i]['id'] = null;
            $role_rite['right'][$i]['name'] = $key1;
            $role_rite['right'][$i]['description'] = "";
            foreach ($val1 as $key2 => $val2)
            {
                $role_rite['right'][$i]['description'] .= $key2;
            }
            $query = "SELECT rights_add(";
            $query .= "'". pg_escape_string($role_rite['right'][$i]['name']) ."',";
            $query .= "'". pg_escape_string($role_rite['right'][$i]['description']) ."'";
            $query .= ")";
            $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
            $right_id = $res->toArray();
            $role_rite['right'][$i]['id'] = $right_id[0]['rights_add'];
            $i++;
        }
        
        foreach ($role_rite['right'] as $val)
        {
            $query = "SELECT role_right_add(";
            $query .= $role_rite['role']['id'] .",";
            $query .= $val['id'];
            $query .= ")";
            $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
        }
        
        return $res->toArray();
    }
    
    public static function update_role($data)
    {
        $query = "
            UPDATE roles
            SET
                name = '". pg_escape_string($data['role_name']) ."',
                description = '". pg_escape_string($data['role_descr']) ."'
            WHERE (id = ". $data['role_id'] .")";
        
        $roles = new Roles();
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
        
        foreach ($data['rights'] as $key => $val)
        {
            if(isset($val['id']))
            {
                $right_descr = "";
                foreach ($val as $key2 => $val2)
                {
                    if($key2 != 'id')
                    {
                        $right_descr .= $key2;
                    }
                }
                if($right_descr != "")
                {
                    $query = "
                        UPDATE rights
                        SET
                            description = '". pg_escape_string($right_descr) ."'
                        WHERE (id = ". $val['id'] .")";
                }
                else
                {
                    $query = "DELETE FROM role_right WHERE (role_id = ". $data['role_id'] .") AND (right_id = ". $val['id'] .");";
                    $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
                    $query = "DELETE FROM rights WHERE (id = ". $val['id'] .");";
                }
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
            }
            else
            {
                $right_descr = "";
                foreach ($val as $key2 => $val2)
                {
                    $right_descr .= $key2;
                }
                $query = "SELECT rights_add(";
                $query .= "'". pg_escape_string($key) ."',";
                $query .= "'". pg_escape_string($right_descr) ."'";
                $query .= ")";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
                $right_id = $res->toArray();
                $right_id = $right_id[0]['rights_add'];
                
                $query = "SELECT role_right_add(";
                $query .= $data['role_id'] .",";
                $query .= $right_id;
                $query .= ")";
                $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
            }
        }
        
        return $data;
    }
    
    public static function delete_role($id)
    {
        $query = "
            SELECT
                r.id AS role_id,
                COUNT(u.id) AS user_count
            FROM roles AS r
            LEFT JOIN users AS u ON (u.role_id = r.id)
            WHERE (r.id = $id)
            GROUP BY r.id";
        
        $roles = new Roles();
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
        $uc = $res->toArray();
        
        if(!$uc)
        {
            return -1;
        }
        if($uc[0]['user_count'] > 0)
        {
            return $uc[0]['user_count'];
        }
        
        $query = "
            DELETE FROM role_right AS rl_rt
            WHERE rl_rt.role_id IN (
                    SELECT rls.id
                    FROM roles AS rls
                    WHERE (rls.id = ". $uc[0]['role_id'] .")
            ); ";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
        
        $query = "DELETE FROM roles WHERE (id = ". $uc[0]['role_id'] .");";
        $res = new Phalcon\Mvc\Model\Resultset\Simple(null, $roles, $roles->getReadConnection()->query($query));
        
        return $uc[0]['user_count'];
    }
}