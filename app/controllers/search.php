<?php

class Search extends Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('category');

    }

    function Index()

    {
        //$data['books']=$this->category->category_result($category_id);
        //$data['categories']=$this->category->get_categories();
        //echo"<pre>"; print_r($data['books']); echo "";
        //$data2=$this->category->category_result($category_id);

        $this->view('header');
        $this->view('navbar');
        $this->view('advance_search');
        $this->view('footer');
    }

    function quick($key="book")
    {
        $quick = $this->model('search_material');
        //$key = str_replace($key,"%20"," ");
        $data['quick_results']=$quick->simple_search($key);
        $this->view('header');
        $this->view('navbar');
        $this->view('search_results',$data);
        $this->view('footer');
    }

    function search_author()
    {
        $author = $_POST['author'];
        $search_model = $this->model('search_material');
        $data['author_search'] = $search_model->author_search($author);
    }

    function advance_search()
    {
        $author = $_POST['author'];
        $title = $_POST['title'];
        $username = $_POST['username'];

        if($author==""){$author=0;}
        if($title==""){$title=0;}
        if($username==""){$username=0;}



        $search_material = $this->model('search_material');
        $return['books'] = $search_material->full_search($title,$author,$username);
        //var_dump($return);
        
        echo json_encode($return['books']);
        
        
        function is_ajax() 
        {
          return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        }
 
        function test_function($action)
        {
          echo json_encode($action);
        }

       /* if (is_ajax()) 
        {

            if (isset($_POST["title"]) && !empty($_POST["title"])) 
            { //Checks if action value exists
                $action = $_POST["title"];
                
                test_function($action);
                
            }
        }*/

        
        

        
    }


}

?>
