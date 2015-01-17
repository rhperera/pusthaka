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
            $collection_name = "networks";
            //$collection_name = $_POST['collection_name'];
            $collection=$this->model('collection');
            $result = $collection->add_new($collection_name,$_SESSION['user_id']);
        }
          
    }

    function delete_collection($collection_id)
    {
        $collection=$this->model('collection');
        $result = $collection->delete($collection_id);
    }
	
	function view_my__collection($user_id)
    {
		$this->load->model('collection');
        $data['records'] = $this->collection->get_my_collections($user_id);
        //$this->load->view('my_collections' , $data);
    }
	
	function Index()
	{
        if(isset($_SESSION['user_name']))
        {
          $category = $this->model('category');
          $data['categories']=$category->get_categories();
          
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

 
