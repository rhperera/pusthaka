<?php

class User
{
	private $user_id;
	private $full_name;
	private $user_name;
	private $reg_number;
	private $email;

	public function __construct()
	{
		//constructor
	}

	public function get_id()
    {
        return $this->user_id;
    }

    public function set_id($user_id)
    {
        $this->user_id=$user_id;
    }

    public function get_full_name()
    {
    	return $this->full_name;
    }

    public function set_full_name($name)
    {
    	$this->full_name=$name;
    }

    public function get_user_name()
    {
    	return $this->user_name;
    }

    public function set_user_name($user_name)
    {
    	$this->user_name=$user_name;
    }

    public function get_reg_number()
    {
    	return $this->reg_number;
    }

    public function set_reg_number($number)
    {
    	$this->reg_number=$number;
    }

    public function get_email()
    {
    	return $this->email;
    }

    public function set_email($email)
    {
    	$this->email=$email;
    }
}