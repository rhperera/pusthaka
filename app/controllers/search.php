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

    function advance_search($title=0,$author=0,$username=0)
    {
        $search_material = $this->model('search_material');
        $results['books'] = $search_material->full_search($title,$author,$username);

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

?>
