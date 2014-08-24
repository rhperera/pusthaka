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
        $data['posts']=$this->post->get_materials(10);
        $data['categories']=$this->category->get_categories();
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
}