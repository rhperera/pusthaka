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
	
	function books($collection_id,$key='book')
    {
		$collection = $this->model('collection');
        $data['records'] = $collection->get_materials_from_collection($collection_id);
        $data['collection_name'] = $collection->get_collection_name($collection_id);
        $data['collection_id'] = $collection_id;


        $quick = $this->model('search_material');
        //$key = str_replace($key,"%20"," ");
        $data['quick_results']=$quick->simple_search($key);

        $posts = $this->model('post');
        $data['books'] = $posts->get_materials_by_id($data['records']);


        $this->view('header');
        $this->view('navbar');
        $this->view('collections' , $data);
        $this->view('footer');
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

    function add_book_to_collection($material_id,$collection_id)
    {
        $collection = $this->model('collection');
        $collection->add_book($collection_id,$material_id);
    
        header("Location: ".ASSET_PATH."/collections/books/".$collection_id);
        
    }

    function remove_material_from_collection($material_id,$collection_id)
    {
        $collection = $this->model('collection');
        $collection->remove_material($material_id,$collection_id);
        header("Location: ".ASSET_PATH."/collections/books/".$collection_id);
    }
}

?>

 
