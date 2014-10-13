<?php
    
class Lpanel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('librarianpanel');
        
    }

    function Index()
    {
        $data['inactives']=$this->librarianpanel->get_inactives();
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('LHome',$data);
        $this->load->view('footer');
    }

    function inactives()
    {
         $data['inactive_list']=$this->librarianpanel->get_inactive_list();
         $this->load->view('header');
         $this->load->view('navbar');
         $this->load->view('non_active',$data);
         $this->load->view('footer');
    }

    function authenticate($id)
    {
        $result = $this->librarianpanel->activate_book($id);
        if($result)
        {
             redirect(base_url().'Lpanel/inactives');
        }
    }
   
}

?>

