<?php
    
class Lpanel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
    }

    function Index()
    {
      
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('LHome');
        $this->load->view('footer');
    }
}

?>

