<?php
/**
 * Created by PhpStorm.
 * User: Raveen
 * Date: 8/23/14
 * Time: 10:46 PM
 */
class User extends CI_Model
{
    function create_user($data)
    {
        $this->db->insert('users',$data);
    }

    function login($user_name,$password)
    {
        $where=array(
            'user_name'=>$user_name,
            'password'=>$password
        );
        $this->db->select('*')->from('users')->where($where);
        $query = $this->db->get();
        return $query->first_row('array');
    }
}