<?php
/**
 * Created by PhpStorm.
 * User: Raveen
 * Date: 8/23/14
 * Time: 10:46 PM
*/

class User
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    function create_user($data)
    {
        //$this->db->insert('users',$data);
    }

    function login($user_name,$password)
    {
        
        $query = $this->db->query("SELECT * FROM users WHERE user_name='".$user_name."' AND password='".$password."'");
        //$query = $this->db->get();
        return $query->fetchAll();
    }
}