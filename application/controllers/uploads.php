<?php

class Uploads extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('category');
    }
	function Index()
	{
        $data['categories']=$this->category->get_categories();
        $user_name = $this->session->userdata('user_name');
        if($user_name)
        {
		  $this->load->view('header.php',$data);
		  $this->load->view('navbar.php',$data);
          $this->load->view('upload_file.php',$data);
		  $this->load->view('footer.php',$data);
        }
        else
        {
            redirect(base_url().'posts');
        }
	}
} 


?>