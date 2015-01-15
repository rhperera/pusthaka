<?php

class UserManager extends Controller
{


    function __construct()
    {
    	
    	parent::__construct();
    	

        
    }

    function Index()
    {
    	if (isset($_SESSION['user_type']) and ($_SESSION['user_type']=='librarian')) {

    		$banlist = $this->model('user');
        	$data['banned_list']=$banlist->get_banned_list();
	    	$this->view('header');
	        $this->view('navbar');
	        $this->view('usermanager',$data);
	        $this->view('footer');
    	}
    	else{
    		header("Location: ".ASSET_PATH."/main#sign");
    	}
    }

    function ban_user($user_id)
    {
    	if (isset($_SESSION['user_type']) and ($_SESSION['user_type']=='librarian')){
	    	$user_manager = $this->model('user');
	    	$result = $user_manager->ban_user($user_id);
	    	header("Location: ".ASSET_PATH."/usermanager");
	    }
	    else{
    		header("Location: ".ASSET_PATH."/main#sign");
    	}
    }

    function unban_user($user_id)
    {
    	if (isset($_SESSION['user_type']) and ($_SESSION['user_type']=='librarian')) {
	    	$user_manager = $this->model('user');
	    	$result = $user_manager->unban_user($user_id);
	    	header("Location: ".ASSET_PATH."/usermanager");
	    }
	    else{
    		header("Location: ".ASSET_PATH."/main#sign");
    	}
    }

    function search_user($key)
    {
        $users_list = $this->model('user');
        $return["json"] = $users_list->get_users($key);
        function is_ajax() 
        {
          return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        }
 
        function test_function($return)
        {
          echo json_encode($return);
        }

        if (is_ajax()) 
        {

            if (isset($_POST["action"]) && !empty($_POST["action"])) 
            { //Checks if action value exists
                $action = $_POST["action"];
                switch($action) 
                { //Switch case for value of action
                    case "recent": test_function($return); break;
                }
            }
        }
    }
}