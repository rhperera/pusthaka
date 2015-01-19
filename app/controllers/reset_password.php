<?php

class Reset_Password extends Controller
{


    function __construct()
    {
        parent::__construct();
    }

    function Index()
    {
    	if(isset($_SESSION['user_name']))
    	{
    		header("Location: ".ASSET_PATH."/main");
    	}
    	else
    	{
	    	$this->view('header');
	        $this->view('navbar');
	        $this->view('reset_password');
	        $this->view('footer');
    	}
    }

    function reset()
    {
    	$email = $_POST['email'];
    	$user = $this->model('user');
    	$result = $user->reset_and_mail($email);
    	header("Location: ".ASSET_PATH."/reset_password");
    }
}