<?php

class Categories extends Controller
{
    function __construct()
    {
        parent::__construct();
        

    }

    /*function view($category_id)

    {
        $data['books']=$this->category->category_result($category_id);
        $data['categories']=$this->category->get_categories();
        //echo"<pre>"; print_r($data['books']); echo "";
        $data2=$this->category->category_result($category_id);

        $this->load->view('header',$data);
        $this->load->view('navbar',$data);
        $this->load->view('search_results',$data);
        $this->load->view('footer',$data);
    }*/

    function add_category()
    {
        if(isset($_SESSION['user_type']) and $_SESSION['user_type']=='librarian')
        {
            $category_name = $_POST['category_name'];
            $cats = $this->model('category');
            $result = $cats->add_category($category_name);
            if($result)
            {
                $_SESSION['add_cat']="true";
            }
            else
            {
                $_SESSION['add_cat']="false";
            }
        }
    }

    function delete_category($category_id)
    {
        if(isset($_SESSION['user_type']) and $_SESSION['user_type']=='librarian')
        {
            $cats = $this->model('category');
            $result = $cats->delete_category($category_id);
            if($result)
            {
                $_SESSION['delete_cat']="true";
            }
            else
            {
                $_SESSION['delete_cat']="false";
            }
        }
    }
}
