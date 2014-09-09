<?php
/**
 * Created by PhpStorm.
 * User: Raveen
 * Date: 8/24/14
 * Time: 12:32 PM
 */
class Users extends CI_Controller
{
    function login()
    {
        $data['error']=0;
        if($_POST)
        {
            $this->load->model('user');
            $user_name = $this->input->post('user_name',true);
            $password  = $this->input->post('password',true);
            $user=$this->user->login($user_name,$password);
            if(!$user)
            {
                $data['error']=1;
            }
            else
            {                
				//$this->session->set_userdata('user_id',$user['user_id']);
                $this->session->set_userdata('user_name',$user['user_name']);
                $this->session->set_userdata('user_type',$user['user_type']);
                redirect(base_url().'posts');
            }
        }
        $this->load->view('header',$data);
        $this->load->view('navbar',$data);
        $this->load->view('login',$data);
        $this->load->view('footer',$data);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url().'posts');
    }
	
	function register()
	{
		if($_POST){
		
			$config=array(
				array(
					'field'=>'user_name',
					'label'=>'Username',
					'rules'=>'trim|required|min_length[3]|is_unique[users.username]'				
				),
				array(
					'field'=>'password',
					'label'=>'Password',
					'rules'=>'trim|required|min_length[5]'				
				),
				array(
					'field'=>'password2',
					'label'=>'Password Confirmed',
					'rules'=>'trim|required|min_length[5]|matches[password]'				
				),
				array(
					'field'=>'email',
					'label'=>'Email',
					'rules'=>'trim|required|is_unique[users.email]|valid_email'			
				)
			);
			$this->load->library('form_validation');
			$this->form_validation->set_rules($config);
			
			if($this->form_validation->run() == FALSE){
				$data['errors'] = validation_errors();
			}
			else{
			
			
		
			$data=array(
				'user_name'=>$_POST['user_name'],
				'password'=>sha1($_POST['password'])
				
			);
			
			$this->load->model('user');
			$userid=$this->user->create_user($data);
			$this->session->set_userdata('user_id',$userid);
	
			redirect(base_url().'posts');
		}	
		}
		
		
		
		$this->load->helper('form');
		$this->load->view('header',$data);
		$this->load->view('navbar',$data);
		$this->load->view('register_user',$data);
		$this->load->view('footer',$data);
	

}
}
