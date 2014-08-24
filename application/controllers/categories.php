<?php
/**
 * Created by PhpStorm.
 * User: Raveen
 * Date: 8/24/14
 * Time: 12:49 AM
 */
class Categories extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('category');
    }

    function view($category_id)

    {
        $data['books']=$this->category->category_result($category_id);
        //echo"<pre>"; print_r($data['books']); echo "";
        $data2=$this->category->category_result($category_id);

        $this->load->view('header',$data);
        $this->load->view('navbar',$data);
        $this->load->view('search_results',$data);
        $this->load->view('footer',$data);
    }
}