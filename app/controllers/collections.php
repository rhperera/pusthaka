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
}