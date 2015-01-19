<?php


class User
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
  

    function login($user_name,$password)
    {
        
        $query = $this->db->query("SELECT * FROM users WHERE user_name='".$user_name."' AND password='".$password."' AND banned=0");
        //$query = $this->db->get();
        return $query->fetchAll();
    }

    function ban_user($user_id)
    {
        $query = $this->db->query("UPDATE users set banned=1 WHERE user_id=$user_id");
        return $query;
    }

    function unban_user($user_id)
    {
        $query = $this->db->query("UPDATE users set banned=0 WHERE user_id=$user_id");
        return $query;
    }

    function get_banned_list()
    {
        $query = $this->db->query("SELECT * FROM users WHERE banned=1");
        return $query->fetchAll();
    }

    function get_users($key)
    {
        $query = $this->db->query("SELECT * FROM users WHERE banned=0 and reg_number LIKE '%".$key."%'");
        return $query->fetchAll();
    }

    function get_user($user_id)
    {
        $query = $this->db->query("SELECT full_name, user_name, reg_number FROM users WHERE user_id=$user_id");
        $return = $query->fetchAll();
        return $return[0];
    }

    function update_pass($old_password,$new_password,$user_id)
    {
        $query = $this->db->query("SELECT password from users WHERE user_id=$user_id");
        $result = $query->fetchAll();
        $old = $result[0]['password'];
        if($old==$old_password)
        {
            $query = $this->db->query("UPDATE users set password='".$new_password."' WHERE user_id=$user_id");
            $result = $query->fetchAll();
            $_SESSION["password_change"]="true";
        }
        else
        {
            $_SESSION["password_change"]="false";
        }
    }

    function user_count()
    {
        $query = $this->db->query("SELECT COUNT(user_id) as user_count from users WHERE user_type='user'");
        $result = $query->fetchAll();
        return $result;

    }

    function get_banned_user_count()
    {
        $query = $this->db->query("SELECT COUNT(user_id) as user_count from users WHERE user_type='user' and banned=1");
        $result = $query->fetchAll();
        return $result;
    }
}