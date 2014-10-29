<?php

class AdvanceSearch extends Controller
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
        //$this->load->view('search_results',$data);
        $this->view('footer');
    }
}

?>