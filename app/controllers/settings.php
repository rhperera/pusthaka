<?php

class Settings extends Controller
{


    function __construct()
    {
        parent::__construct();
        
    }


    function Index()
    {
    	$this->view('header');
        $this->view('navbar');
        $this->view('settings');
        $this->view('footer');
    }

    function update_password()
    {
    	if(isset($_SESSION['user_id']))
    	{
	    	$old_password = $_POST['old_password'];
	    	$new_password = $_POST['new_password'];
	    	$user_id	  = $_SESSION['user_id'];

	    	$user = $this->model('user');
	    	$user->update_pass($old_password,$new_password,$user_id);
	    	header("Location: ".ASSET_PATH."/settings");
	    }
    }

    function request_permission($material_id,$uploader_id)
    {
        $user_id = $_SESSION['user_id'];
        $permission = $this->model('permissions');
        $request = $permission->request_permission($material_id,$user_id,$uploader_id);
        header("Location: ".ASSET_PATH."/main/item/".$material_id); 
    }

    function grant_permission($material_id,$user_id)
    {
        $permission = $this->model('permissions');
        $request = $permission->single_material_permission($user_id,$material_id);
        header("Location: ".ASSET_PATH."/settings/delete_request/".$material_id."/".$user_id); 
    }

    function delete_request($material_id,$user_id)
    {
        $permission = $this->model('permissions');
        $request = $permission->delete_request($user_id,$material_id);
        header("Location: ".ASSET_PATH."/mytable"); 
    }
}