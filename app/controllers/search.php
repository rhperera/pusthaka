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
}

?>
