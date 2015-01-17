<?php

class Collections extends Controller
{


    function __construct()
    {
        parent::__construct();
    }

    
    function add_collection()
    {
        if($_POST)
        {
            $collection_name = $_POST['collection_name'];
            //$collection_name = $_POST['collection_name'];
            $collection=$this->model('collection');
            $result = $collection->add_new($collection_name,$_SESSION['user_id']);
            if($result){
                $_SESSION['collection_added']="true";
                header("Location: ".ASSET_PATH."/collections");
            }
            else{
                $_SESSION['collection_added']="false";
                header("Location: ".ASSET_PATH."/collections");
            }
        }
          
    }

    function delete_collection($collection_id)
    {
        $collection=$this->model('collection');
        $result = $collection->delete($collection_id);
        if($result){
                $_SESSION['collection_deleted']="true";
                header("Location: ".ASSET_PATH."/collections");
            }
            else{
                $_SESSION['collection_deleted']="false";
                header("Location: ".ASSET_PATH."/collections");
            }
    }
	
	function books($collection_id)
    {
		$this->model('collection');
        $data['records'] = $this->collection->get_my_collections($user_id);
        //$this->load->view('my_collections' , $data);
    }
	
	function Index()
	{
        if(isset($_SESSION['user_name']))
        {
            $user_id =$_SESSION['user_id'];
          $collection = $this->model('collection');
          $data['records'] = $collection->get_my_collections($user_id);
          
		  $this->view('header',$data);
		  $this->view('navbar',$data);
		  $this->view('my_collections' , $data);
		  $this->view('footer',$data);
        }
        else
        {
            header("Location: ".ASSET_PATH);
        }
	}
}

?>

 
