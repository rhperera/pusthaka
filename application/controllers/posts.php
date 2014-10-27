<?php
/**
 * Created by PhpStorm.
 * User: Raveen
 * Date: 8/22/14
 * Time: 2:01 PM
 */
class Posts extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('post');
        $this->load->model('category');
    }
    function index()
    {
        //$data['posts']=$this->post->get_materials(10);
        $data['categories']=$this->category->get_categories();
        $data['recents']=$this->post->get_materials(10);
        //echo"<pre>"; print_r($data['posts']); echo "";
        $this->load->view('header',$data);
        $this->load->view('navbar',$data);
        $this->load->view('home',$data);
        $this->load->view('footer',$data);
    }
    function item($material_id)
    {
        $user_name = $this->session->userdata('user_name');
        if($user_name)
        {
            $data['item']=$this->post->get_material($material_id);
            $data['categories']=$this->category->get_categories();
            $this->load->view('header',$data);
            $this->load->view('navbar',$data);
            $this->load->view('item_view',$data);
            $this->load->view('footer',$data);
        }
        else
        {
            redirect(base_url().'posts');
        }
    }

    function browse()
    {
        $data['recents']=$this->post->get_materials(10);
        $this->load->view('header',$data);
        $this->load->view('navbar',$data);
        $this->load->view('recentbooks',$data);
        $this->load->view('footer',$data);
    }

    function browse_call()
    {
         
        $return["json"] = $this->post->get_materials(10);
        //Function to check if the request is an AJAX request
        function is_ajax() 
        {
          return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        }
 
        function test_function($return)
        {
          //$return = $_POST;
  
          //Do what you need to do with the info. The following are some examples.
          //if ($return["favorite_beverage"] == ""){
          //  $return["favorite_beverage"] = "Coke";
          //}
          //$return["favorite_restaurant"] = $this->post->get_materials(10);
  
          //$return["json"] = 
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

    function category_call($id)
    {
        $return["json"] = $this->category->category_result($id);
        //Function to check if the request is an AJAX request
        function is_ajax() 
        {
          return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        }
 
        function test_function($return)
        {
          //$return = $_POST;
  
          //Do what you need to do with the info. The following are some examples.
          //if ($return["favorite_beverage"] == ""){
          //  $return["favorite_beverage"] = "Coke";
          //}
          //$return["favorite_restaurant"] = $this->post->get_materials(10);
  
          //$return["json"] = 
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