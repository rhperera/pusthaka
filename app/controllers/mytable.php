<?php

class MyTable extends Controller
{


    function __construct()
    {
        parent::__construct();
    }

    function Index()
    {
    	$this->view('header');   	
		$this->view('navbar');
        $this->view('navbar_side');
		$this->view('footer');
    }

    function delete_material($material_id)
    {
        if(isset($_SESSION['user_name']))
        {
            $user_id    =$_SESSION['user_id'];
            $user_type  =$_SESSION['user_type'];
            $post = $this->model('post');
            $result = $post->delete_material($user_id,$material_id,$user_type);
            var_dump($result);
        }
    }
	
	
}
