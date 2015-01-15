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
}